<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InventoryUpload;
use App\Models\Master\Drug;
use App\Models\Master\Vendor;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class InventoryUploadController extends Controller
{
    public function import(Request $request)
    {
        // Validasi file harus xlsx atau xls
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        // Cek jika file tidak ada
        if (!$request->hasFile('file')) {
            return back()->with('error', 'Tidak ada file yang diunggah.');
        }

        // Mendapatkan file yang di-upload
        $file = $request->file('file');

        try {
            // Hapus data sesi sebelumnya jika ada
            Session::forget('imported_data');

            // Import file menggunakan class InventoryUpload
            Excel::import(new InventoryUpload, $file);
            $importedData = Session::get('imported_data');

            // Debug: Periksa struktur data yang diimpor
            // dd($importedData);

            // Cek jika data kosong
            if (empty($importedData) || (is_object($importedData) && $importedData->isEmpty())) {
                return back()->with('warning', 'Tidak ada data valid yang berhasil diimpor.');
            }

            // Ambil data dari database
            $vendors = Vendor::all();
            $drugs = Drug::all();
            $judul = "Tambah Barang";

            // Kirim ke view dengan data hasil import
            return view("pages.inventory.addStuff", compact('vendors', 'drugs', 'judul', 'importedData'));

        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
