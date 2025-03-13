<?php

namespace App\Http\Controllers;

use App\Models\Transaction\TransactionDetail;
use App\Models\Profile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PDFKlinikController extends Controller
{
    public function generatePDF($transaction_id)
    {
        // // Ambil informasi klinik dari tabel Profile
        // $profile = Profile::first();
        // $clinic_name = $profile->name ?? 'Nama Klinik';
        // $clinic_address = $profile->address ?? 'Alamat Klinik';
        // $clinic_phone = $profile->phone ?? 'No. Telepon Klinik';

        // // Ambil semua TransactionDetail berdasarkan transaction_id
        // $transactionDetails = TransactionDetail::where('transaction_id', $transaction_id)
        // ->with('transaction')
        // ->first();

        // // Ambil satu TransactionDetail sebagai acuan
        // $transactionDetail = $transactionDetails->first();

        // // Pastikan transaksi ditemukan
        // if (!$transactionDetail || !$transactionDetail->transaction) {
        //     abort(404, "Transaksi tidak ditemukan.");
        // }

        // // Ambil data transaksi
        // $transaction = $transactionDetail->transaction;
        // $no_lpb = $transaction->code ?? 'N/A';
        // $tanggal_transaksi = Carbon::parse($transaction->created_at)->translatedFormat('j F Y');

        // // Ambil semua detail transaksi dengan relasi drug dan transaction
        // $details = TransactionDetail::with(['drugs', 'transaction'])
        //     ->where('transaction_id', $transaction_id)
        //     ->get();

        // // Periksa apakah ada detail transaksi
        // if ($details->isEmpty()) {
        //     abort(404, "Transaksi tidak ditemukan.");
        // }

        // Ambil informasi klinik dari tabel Profile
        $profile = Profile::first();
        $clinic_name = $profile->name ?? 'Nama Klinik';
        $clinic_address = $profile->address ?? 'Alamat Klinik';
        $clinic_phone = $profile->phone ?? 'No. Telepon Klinik';

        // Ambil satu TransactionDetail sebagai acuan
        $transactionDetail = TransactionDetail::where('transaction_id', $transaction_id)
            ->with('transaction')
            ->first();

        // Pastikan transaksi ditemukan
        if (!$transactionDetail || !$transactionDetail->transaction) {
           Log::warning("Export gagal: Tidak ada transaksi dengan ID " . $transaction_id);
            return collect([]);
        }

        // Ambil data transaksi
        $transaction = $transactionDetail->transaction;
        $no_lpb = $transaction->code ?? 'N/A';
        $tanggal_transaksi = $transaction->created_at
            ? Carbon::parse($transaction->created_at)->translatedFormat('j F Y')
            : now()->translatedFormat('j F Y');

        // Ambil detail transaksi
        $details = TransactionDetail::select(
                'transaction_details.*',
                'drugs.code as drug_code',
                'drugs.name as drug_name'
            )
            ->leftJoin('drugs', 'transaction_details.drug_id', '=', 'drugs.id')
            ->where('transaction_details.transaction_id', $transaction_id)
            ->get();
        // dd($details);


        // Perhitungan total harga
        // $grand_total = $details->sum('total_price');
        // Isi Data
        $grand_total = 0;
        foreach ($details as $index => $item) {
            $data[] = [
                $index + 1,
                $item->drug_code ?? '-',
                $item->drug_name ?? '-',
                $item->quantity . ' ',
                'Rp ' . number_format($item->piece_price, 0, ',', '.'),
                'Rp ' . number_format($item->total_price, 0, ',', '.'),
            ];
            $grand_total += $item->total_price;
        }

        // Load view untuk PDF
        $pdf = Pdf::loadView('pages.clinic.pdf.klinik', compact(
            'clinic_name', 'clinic_address', 'clinic_phone', 'no_lpb', 'tanggal_transaksi', 'details', 'grand_total'
        ))->setPaper('A4', 'portrait');



        return $pdf->download('Laporan_Penerimaan_Klinik.pdf');
    }

}
