@extends('layouts.main')
@section('container')
<div class="max-w-4xl mx-auto">
    <!-- Detail Obat Section -->
    <div class="bg-white shadow-md rounded-lg mb-6">
        <div class="bg-gray-200 p-4 rounded-t-lg">
            <h2 class="text-lg font-semibold">Detail Obat</h2>
        </div>
        <div class="p-4">
            <table class="w-full">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Nama</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Kode Obat</td>
                        <td class="py-2">#abc111</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Jenis</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Kategori</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Produsen</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Vendor</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-medium">Sisa</td>
                        <td class="py-2">123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Stok Obat Section -->
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-4">
            <h2 class="text-lg font-semibold mb-4">STOK OBAT</h2>
            <table class="w-full text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">NO</th>
                        <th class="py-2 px-4">JENIS PACKAGING OBAT</th>
                        <th class="py-2 px-4">MARGIN</th>
                        <th class="py-2 px-4">STOK KONVERSI</th>
                        <th class="py-2 px-4">HARGA JUAL</th>
                        <th class="py-2 px-4">KUANTITI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">...</td>
                        <td class="py-2 px-4">...</td>
                        <td class="py-2 px-4">...</td>
                        <td class="py-2 px-4">RP15.000</td>
                        <td class="py-2 px-4">20</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-end mt-4">
                <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100 hover:text-gray-700"> < </a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">...</a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">9</a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">10</a>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100 hover:text-gray-700"> > </a>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
