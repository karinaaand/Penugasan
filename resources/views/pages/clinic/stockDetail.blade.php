@extends('layouts.main')
@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <head><title>List Stok Obat</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/></head>
        <div class="container mx-auto p-4">
            <div class="flex items-center mb-4">
                <a class="text-blue-600 flex items-center mr-4" href="{{ route('clinic.stocks.index') }}">
                    <i class="fas fa-arrow-left mr-2"></i></a>
                <h1 class="text-2xl font-bold">List Stok Obat</h1>
            </div>
      </div>
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
       <!-- Table Stok Obat -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
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
                <!-- Data Row 1 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">1</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>
                <!-- Data Row 2 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>
                <!-- Data Row 3 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>
                <!-- Data Row 4 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">4</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>
                <!-- Data Row 5 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 text-center">Antibiotik (100ml)</td>
                    <td class="py-3 px-6 text-center">15%</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">15.000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <!-- Pagination -->
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">3</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">9</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">10</a>
                </nav>
            </div>
        </div>
    <h2 class="text-xl font-semibold mb-4">KATEGORI BERDASARKAN EXP DATE</h2>
           <!-- Table berdasarkan exp -->
           <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Waktu Expired Obat</th>
                        <th class="border p-2">Kuantiti</th>
                        <th class="border p-2">Action</th>
                    </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <!-- Data Row 1 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">1</td>
                    <td class="py-3 px-6 text-center">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.trash',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
                <!-- Data Row 2 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 text-center">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.trash',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
                <!-- Data Row 3 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 text-center">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.trash',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
                <!-- Data Row 4 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">4</td>
                    <td class="py-3 px-6 text-center">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.trash',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
                <!-- Data Row 5 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 text-center">12 Desember 2024</td>
                    <td class="py-3 px-6 text-center">150</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('inventory.retur',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Retur</a>
                        <a href="{{ route('inventory.trash',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Buang</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <!-- Pagination -->
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">3</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">9</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">10</a>
                </nav>
            </div>
        </div>
        <!-- Tabel Histori Transaksi -->
    <h2 class="text-xl font-semibold mb-4">HISTORI TRANSAKSI</h2>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div style="overflow-x: auto;"> <!-- Tambahkan style inline untuk scroll horizontal -->
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
                <!-- Data Row 1 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">1</td>
                    <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                    <td class="py-3 px-6 text-center">Margin</td>
                    <td class="py-3 px-6 text-center">Harga Jual</td>
                    <td class="py-3 px-6 text-center">Kuantiti</td>
                    <td class="py-3 px-6 text-center">Terjual</td>
                    <td class="py-3 px-6 text-center">Retur</td>
                    <td class="py-3 px-6 text-center">Buang</td>
                    <td class="py-3 px-6 text-center">Subtotal</td>
                </tr>
                <!-- Data Row 2 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                    <td class="py-3 px-6 text-center">Margin</td>
                    <td class="py-3 px-6 text-center">Harga Jual</td>
                    <td class="py-3 px-6 text-center">Kuantiti</td>
                    <td class="py-3 px-6 text-center">Terjual</td>
                    <td class="py-3 px-6 text-center">Retur</td>
                    <td class="py-3 px-6 text-center">Buang</td>
                    <td class="py-3 px-6 text-center">Subtotal</td>
                </tr>
                <!-- Data Row 3 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                    <td class="py-3 px-6 text-center">Margin</td>
                    <td class="py-3 px-6 text-center">Harga Jual</td>
                    <td class="py-3 px-6 text-center">Kuantiti</td>
                    <td class="py-3 px-6 text-center">Terjual</td>
                    <td class="py-3 px-6 text-center">Retur</td>
                    <td class="py-3 px-6 text-center">Buang</td>
                    <td class="py-3 px-6 text-center">Subtotal</td>
                </tr>
                <!-- Data Row 4 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">4</td>
                    <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                    <td class="py-3 px-6 text-center">Margin</td>
                    <td class="py-3 px-6 text-center">Harga Jual</td>
                    <td class="py-3 px-6 text-center">Kuantiti</td>
                    <td class="py-3 px-6 text-center">Terjual</td>
                    <td class="py-3 px-6 text-center">Retur</td>
                    <td class="py-3 px-6 text-center">Buang</td>
                    <td class="py-3 px-6 text-center">Subtotal</td>
                </tr>
                <!-- Data Row 5 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 text-center">Jenis Packaging Obat</td>
                    <td class="py-3 px-6 text-center">Margin</td>
                    <td class="py-3 px-6 text-center">Harga Jual</td>
                    <td class="py-3 px-6 text-center">Kuantiti</td>
                    <td class="py-3 px-6 text-center">Terjual</td>
                    <td class="py-3 px-6 text-center">Retur</td>
                    <td class="py-3 px-6 text-center">Buang</td>
                    <td class="py-3 px-6 text-center">Subtotal</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <!-- Pagination -->
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">3</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">9</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">10</a>
                </nav>
            </div>
        </div>
    </body>
   </html>
@endsection