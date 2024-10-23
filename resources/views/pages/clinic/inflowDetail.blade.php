@extends('layouts.main')
@section('container')

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold">NAMA KLINIK</h2>
                <p class="text-gray-600">Tanggal : 19 September 2024</p>
            </div>
            <div class="flex items-center justify-center w-full mb-4">
                <label for="lpb" class="text-black text-lg font-normal mr-2">No. LPB :</label>
                <input type="text" id="lpb" class="border-b border-gray-300 focus:outline-none focus:border-gray-500">
            </div>
        </div>
        <h3 class="text-center text-xl font-bold mb-4">LAPORAN PENERIMAAN BARANG KLINIK</h3>
        <p class="font-semibold mb-2">Diterima</p>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">NO</th>
                    <th class="py-2 px-4 border">KODE BARANG</th>
                    <th class="py-2 px-4 border">NAMA BARANG</th>
                    <th class="py-2 px-4 border">KUANTITI</th>
                    <th class="py-2 px-4 border">HARGA SATUAN</th>
                    <th class="py-2 px-4 border">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">1</td>
                    <td class="py-2 px-4 border">#AAA111</td>
                    <td class="py-2 px-4 border">NAMA BARANG 1</td>
                    <td class="py-2 px-4 border">10</td>
                    <td class="py-2 px-4 border">Rp1.500</td>
                    <td class="py-2 px-4 border">Rp150.000</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end items-center mt-4">
            <p class="font-semibold mr-2">Grand total :</p>
            <input type="text" value="Rp750.000" class="border-b border-gray-400 focus:outline-none focus:border-black">
        </div>
        <div class="flex justify-start mt-6">
            <button class="bg-yellow-400 text-black font-bold py-2 px-6 rounded-lg">CETAK</button>
        </div>
    </div>

@endsection
