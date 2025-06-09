<?php

namespace App\Http\Controllers;

use App\Exports\DrugExport;
use App\Exports\ReportExport;
use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use App\Models\Profile;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Inventory\Clinic;

class ReportController extends Controller
{
    public function searchTransaction(Request $request)
    {
        $query = $request->input('query');
        $transactions = Transaction::where('code', 'like', "%{$query}%")->with('detail')->get();

        return response()->json($transactions);
    }

    public function drugs(Request $request){
        $judul = "Laporan Obat";
        $query = $request->input('query');
        
        if ($query) {
            $drugs = Drug::where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('code', 'like', "%{$query}%");
            })->get();
        } else {
            $drugs = Drug::all();
        }
        
        $stocks = $drugs->map(function($drug) {
            $warehouseStock = Warehouse::where('drug_id', $drug->id)->first();
            $clinicStock = Clinic::where('drug_id', $drug->id)->first();
            
            $totalStock = ($warehouseStock ? $warehouseStock->quantity : 0) + 
                         ($clinicStock ? $clinicStock->quantity : 0);
            
            $oldest = null;
            $latest = null;
            
            if ($totalStock > 0) {
                if ($warehouseStock && $warehouseStock->quantity > 0) {
                    $oldest = $warehouseStock->oldest;
                    $latest = $warehouseStock->latest;
                }
                if ($clinicStock && $clinicStock->quantity > 0) {
                    if ($oldest === null || $clinicStock->oldest < $oldest) {
                        $oldest = $clinicStock->oldest;
                    }
                    if ($latest === null || $clinicStock->latest > $latest) {
                        $latest = $clinicStock->latest;
                    }
                }
            }
            
            return (object)[
                'drug' => $drug,
                'quantity' => $totalStock,
                'oldest' => $oldest,
                'latest' => $latest
            ];
        });

        $page = request()->get('page', 1);
        $perPage = 5;
        $stocks = new \Illuminate\Pagination\LengthAwarePaginator(
            $stocks->forPage($page, $perPage),
            $stocks->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        return view("pages.report.drug", compact('judul', 'stocks'));
    }
//Menambahkan drugDetail
    public function drugDetail(Drug $stock, Request $request)
    {
        $judul = "Stok ".$stock->name;
        $drug = $stock;
        
        $warehouseStock = Warehouse::where('drug_id', $drug->id)->first();
        $clinicStock = Clinic::where('drug_id', $drug->id)->first();
        
        $warehouseDetails = TransactionDetail::where('drug_id', $drug->id)
            ->whereHas('transaction', function($q) {
                $q->where('variant', 'LPB');
            })
            ->orderBy('expired');
            
        $clinicDetails = TransactionDetail::where('drug_id', $drug->id)
            ->whereHas('transaction', function($q) {
                $q->where('variant', 'LPK');
            })
            ->orderBy('expired');
            
        $details = $warehouseDetails->union($clinicDetails)
            ->orderBy('expired')
            ->paginate(10, ['*'], 'expired');
        
        $transactionsQuery = TransactionDetail::with('transaction')
            ->where('drug_id', $drug->id);
            
        if ($request->has('start') && $request->has('end')) {
            $end = Carbon::parse($request->end)->endOfDay();
            $transactionsQuery->whereHas('transaction', function($q) use ($request, $end) {
                $q->whereBetween('created_at', [$request->start, $end]);
            });
        }
        
        $transactions = $transactionsQuery->orderBy('created_at')->paginate(5, ['*'], 'transaction');
        
        $totalStock = ($warehouseStock ? $warehouseStock->quantity : 0) + 
                      ($clinicStock ? $clinicStock->quantity : 0);
        
        return view("pages.report.drugDetail", compact('drug', 'warehouseStock', 'clinicStock', 'judul', 'details', 'transactions', 'totalStock'));
    }

    public function drugPrint(){

    }
    public function transactions(Request $request){
        $judul = "Laporan Transaksi";
        if($request->has('start') && $request->has('end')){
            $end = Carbon::parse($request->end)->endOfDay();
            $transactions = Transaction::whereBetween('created_at',[$request->start,$end])->paginate(10);
            // dd($transactions);
        }else{
            $transactions = Transaction::paginate(10);
        }
        return view("pages.report.transaction",compact('judul','transactions'));
    }
    public function transactionPrint(){

    }
    // menambahkan excel
    public function exportExcel($transaction_id = null)
    {
        return Excel::download(new ReportExport($transaction_id), 'Report.xlsx');
    }

    // menambahkan pdf
    public function generate()
    {
        $warehouses = Warehouse::with('data')->get();

        $pdf = Pdf::loadView('pages.report.pdf.pdfreport', compact('warehouses'));

        return $pdf->download('laporan_stok.pdf'); // Tanpa format tanggal
    }


    //menambahkan excel detail
    public function exportExcelDetail($id)
    {
        // Cari data obat
        $drug = Drug::find($id);

        if (!$drug) {
            return response()->json(['error' => 'Obat tidak ditemukan'], 404);
        }

        // Ambil stok dari relasi warehouse
        $stock = $drug->warehouse()->first();

        // Ambil ID transaksi masuk (LPB)
        $inflow = Transaction::where('variant', 'LPB')->pluck('id');

        // Detail stok masuk berdasarkan expired (hanya yang stoknya tidak nol)
        $details = TransactionDetail::where('drug_id', $drug->id)
            ->whereIn('transaction_id', $inflow)
            ->where('stock', '!=', 0)
            ->orderBy('expired')
            ->get();

        // Ambil semua histori transaksi untuk obat tersebut
        $transactions = TransactionDetail::with('transaction')
            ->where('drug_id', $drug->id)
            ->get();

        // Ekspor ke Excel menggunakan view
        return Excel::download(
            new DrugExport($drug, $stock, $details, $transactions),
            'detail_obat.xlsx'
        );
    }

    //menambahkan fungsi pdfreportdetail
    public function exportPdfDetail($id)
    {
        $drug = \App\Models\Master\Drug::find($id);

        if (!$drug) {
            return response()->json(['error' => 'Obat tidak ditemukan'], 404);
        }

        $stock = $drug->warehouse()->first();

        $inflow = \App\Models\Transaction\Transaction::where('variant', 'LPB')->pluck('id');

        $details = \App\Models\Transaction\TransactionDetail::where('drug_id', $drug->id)
            ->whereIn('transaction_id', $inflow)
            ->where('stock', '!=', 0)
            ->orderBy('expired')
            ->get();

        $transactions = \App\Models\Transaction\TransactionDetail::with('transaction')
            ->where('drug_id', $drug->id)
            ->get();

        // Tambahkan drug secara manual untuk histori transaksi
        foreach ($transactions as $transaction) {
            $transaction->drug = $drug;
        }

        $pdf = Pdf::loadView('pages.report.pdf.pdfreportdetail', [
            'drug' => $drug,
            'stock' => $stock,
            'details' => $details,
            'transactions' => $transactions
        ])->setPaper('A4', 'portrait');


        return $pdf->download('detail_obat.pdf');
    }

    //fungsi pdftransaction
    public function exportPdf(Request $request)
    {
        // Ambil semua transaksi tanpa eager loading
        $transactions = Transaction::all();

        // Load view PDF
        $pdf = Pdf::loadView('pages.report.pdf.pdftransaction', compact('transactions'));
        return $pdf->download('laporan_transaksi.pdf');
    }



}

