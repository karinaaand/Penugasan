<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Support\Facades\Storage;

class PdfInventoryController extends Controller
{
    public function generatePdf($transaction_id)
    {

        // Ambil satu detail transaksi untuk referensi No. LPB dan Tanggal
        $transactionDetail = TransactionDetail::where('transaction_id', $transaction_id)
            ->with('transaction') // Pastikan relasi transaction dimuat
            ->first();

        if (!$transactionDetail || !$transactionDetail->transaction) {
            return response()->json(['error' => 'Transaksi tidak ditemukan!'], 404);
        }

        // Ambil informasi dari transaksi
        $transaction = $transactionDetail->transaction;
        $no_lpb = $transaction->code ?? 'N/A'; // Gunakan code dari transaksi sebagai No. LPB
        $tanggal_transaksi = $transaction->created_at
            ? \Carbon\Carbon::parse($transaction->created_at)->format('d F Y')
            : now()->format('d F Y');

         // Ambil data pemasok dari transaksi
         $vendor = $transaction->vendor();
        //  dd($vendor);
         $vendor_name = $vendor ? $vendor->name : 'Vendor Tidak Diketahui';
         $vendor_address = $vendor ? $vendor->address : '-';
         $vendor_phone = $vendor ? $vendor->phone : '-';

        // Ambil semua detail transaksi
        $details = TransactionDetail::select(
                'transaction_details.*',
                'drugs.code as drug_code',
                'drugs.name as drug_name'
            )
            ->leftJoin('drugs', 'transaction_details.drug_id', '=', 'drugs.id')
            ->where('transaction_details.transaction_id', $transaction_id)
            ->get();

        $grand_total = $details->sum('total_price');
        $profile = Profile::first();

        // Generate PDF dengan tambahan No. LPB dan Tanggal Transaksi
        $pdf = Pdf::loadView('pages.inventory.pdf.inventory', compact('details', 'grand_total', 'transaction_id', 'no_lpb', 'tanggal_transaksi', 'vendor_name', 'vendor_address', 'vendor_phone', 'profile' ));

        $pdfFilePath = storage_path("app/public/inventory_{$transaction_id}.pdf");
        Storage::put("public/inventory_{$transaction_id}.pdf", $pdf->output());

        return response()->download($pdfFilePath);
    }

}
