@extends('layouts.main')
@section('container')
    <div class="bg-white shadow-md rounded-lg mb-6">
        <div class="bg-gray-200 p-4 rounded-t-lg">
            <h2 class="font-semibold">Detail Obat</h2>
        </div>
        <div class="p-4">
            <table class="w-full">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2">Nama</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Kode Obat</td>
                        <td class="py-2">#abc111</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Jenis</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Kategori</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Produsen</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Vendor</td>
                        <td class="py-2">NULL</td>
                    </tr>
                    <tr>
                        <td class="py-2">Sisa</td>
                        <td class="py-2">123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h2 class="text-xl font-semibold mb-4">STOK OBAT</h2>
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                    <th class="border p-2">No</th>
                    <th class="border p-2">Jenis Packaging Obat</th>
                    <th class="border p-2">Margin</th>
                    <th class="border p-2">Stok konversi</th>
                    <th class="border p-2">Harga Jual</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @for ($i = 1; $i < 8; $i++)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">{{ $i }}</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>

                @endfor
            </tbody>
        </table>
        <div class="flex justify-end items-center mt-4 gap-4">
            <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
    <h2 class="text-xl font-semibold my-4">KATEGORI BERDASARKAN EXP DATE</h2>
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                    <th class="border p-2 text-sm font-inter">No</th>
                    <th class="border p-2 text-sm font-inter">Waktu Expired Obat</th>
                    <th class="border p-2 text-sm font-inter">Kuantiti</th>
                    <th class="border p-2 text-sm font-inter">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @for ($i = 1; $i < 8; $i++)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center text-sm font-inter"">{{ $i }}</td>
                    <td class="py-3 px-6 text-center text-sm font-inter"">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center text-sm font-inter"">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur', 1) }}"
                            class="bg-gold text-black text-sm px-2 py-1 rounded-lg shadow hover:bg-gold-700 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.stocks.show', 1) }}"
                            class="bg-pink text-black text-sm px-2 py-1 rounded-lg shadow hover:bg-pink-700 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div class="flex justify-end items-center mt-4 gap-4">
            <div class="text-sm font-inter">Showing 1 to 10 of 50 entries</div>
            <!-- Pagination -->
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Tabel Histori Transaksi -->
    <h2 class="text-xl font-semibold my-4">HISTORI TRANSAKSI</h2>
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <div style="overflow-x: auto;">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="border p-2" rowspan="2">No</th>
                        <th class="border p-2" rowspan="2">Jenis Packaging Obat</th>
                        <th class="border p-2" rowspan="2">Margin</th>
                        <th class="border p-2" rowspan="2">Harga Jual</th>
                        <th class="border p-2" rowspan="2">Kuantiti</th>
                        <th class="border p-2" colspan="3">Status</th>
                        <th class="border p-2" rowspan="2">Subtotal</th>
                    </tr>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="border p-2">Terjual</th>
                        <th class="border p-2">Retur</th>
                        <th class="border p-2">Buang</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @for ($i = 1; $i < 8; $i++)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">{{ $i }}</td>
                        <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                        <td class="py-3 px-6 text-center">Margin</td>
                        <td class="py-3 px-6 text-center">Harga Jual</td>
                        <td class="py-3 px-6 text-center">Kuantiti</td>
                        <td class="py-3 px-6 text-center">Terjual</td>
                        <td class="py-3 px-6 text-center">Retur</td>
                        <td class="py-3 px-6 text-center">Buang</td>
                        <td class="py-3 px-6 text-center">Subtotal</td>
                    </tr>

                    @endfor
                </tbody>
            </table>
        </div>
        <div class="flex justify-end items-center mt-4 gap-4">
            <div class="text-sm">Showing 1 to 10 of 50 entries</div>
                <!-- Pagination -->
                <div class="flex justify-end">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
