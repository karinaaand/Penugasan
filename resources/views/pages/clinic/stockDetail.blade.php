@extends('layouts.main')
@section('container')

    <head>
        <title>List Obat</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    </head>
    <div class="container mx-auto p-4">
        <div class="flex items-center mb-4">
            <a class="text-blue-600 flex items-center mr-4" href="{{ route('clinic.stocks.index') }}">
                <i class="fas fa-arrow-left mr-2"></i></a>
            <h1 class="text-2xl font-bold">List Stock Obat</h1>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg mb-6">
        <div class="bg-gray-200 p-4 rounded-t-lg">
            <h2 class="font-semibold text-base font-inter">Detail Obat</h2>
        </div>
        <div class="p-4">
            <table class="w-full">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Nama</td>
                        <td class="py-2 text-base font-inter">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Kode Obat</td>
                        <td class="py-2 text-base font-inter">#abc111</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Jenis</td>
                        <td class="py-2 text-base font-inter">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Kategori</td>
                        <td class="py-2 text-base font-inter">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Produsen</td>
                        <td class="py-2 text-base font-inter">NULL</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-base font-inter">Vendor</td>
                        <td class="py-2 text-base font-inter">NULL</td>
                    </tr>
                    <tr>
                        <td class="py-2 text-base font-inter">Sisa</td>
                        <td class="py-2 text-base font-inter">123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h2 class="text-xl font-semibold font-inter mb-4">STOK OBAT</h2>
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
                @for ($i = 1; $i < 8; $i++)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center text-base font-inter">{{ $i }}</td>
                        <td class="py-3 px-6 text-center text-base font-inter">Antibiotik (100ml)</td>
                        <td class="py-3 px-6 text-center text-base font-inter">15%</td>
                        <td class="py-3 px-6 text-center text-base font-inter">100</td>
                        <td class="py-3 px-6 text-center text-base font-inter">15.000</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <div class="flex justify-end items-center mt-4 gap-4">
            <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
    <h2 class="text-xl font-semibold font-inter my-4 mt-4">KATEGORI BERDASARKAN EXP DATE</h2>
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
                @for ($i = 1; $i < 8; $i++)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center text-basefont-inter">{{ $i }}</td>
                        <td class="py-3 px-6 text-center text-base font-inter">12 Desember 2024</td>
                        <td class="py-3 px-6 text-center text-base font-inter">150</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex space-x-2 justify-center items-center">
                                <a href="{{ route('inventory.retur', 1) }}"
                                    class="px-3 py-2 rounded-lg shadow bg-yellow-300 transition-colors duration-200 flex items-center justify-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.414 6.00002L15.243 7.82802L13.828 9.24302L9.586 5.00002L13.828 0.757019L15.243 2.17202L13.414 4.00002H16C17.3261 4.00002 18.5979 4.5268 19.5355 5.46449C20.4732 6.40217 21 7.67394 21 9.00002V13H19V9.00002C19 8.20437 18.6839 7.44131 18.1213 6.8787C17.5587 6.31609 16.7956 6.00002 16 6.00002H13.414ZM15 11V21C15 21.2652 14.8946 21.5196 14.7071 21.7071C14.5196 21.8947 14.2652 22 14 22H4C3.73478 22 3.48043 21.8947 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V11C3 10.7348 3.10536 10.4804 3.29289 10.2929C3.48043 10.1054 3.73478 10 4 10H14C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11ZM13 12H5V20H13V12Z"
                                            fill="black" />
                                    </svg>
                                </a>
                                <a href="{{ route('inventory.stocks.show', 1) }}"
                                    class="px-3 py-2 rounded-lg shadow bg-pink-600 transition-colors duration-200 flex items-center justify-center">
                                    <svg width="20" height="20" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.167 5.50002H18.3337V7.16669H16.667V18C16.667 18.221 16.5792 18.433 16.4229 18.5893C16.2666 18.7456 16.0547 18.8334 15.8337 18.8334H4.16699C3.94598 18.8334 3.73402 18.7456 3.57774 18.5893C3.42146 18.433 3.33366 18.221 3.33366 18V7.16669H1.66699V5.50002H5.83366V3.00002C5.83366 2.77901 5.92146 2.56704 6.07774 2.41076C6.23402 2.25448 6.44598 2.16669 6.66699 2.16669H13.3337C13.5547 2.16669 13.7666 2.25448 13.9229 2.41076C14.0792 2.56704 14.167 2.77901 14.167 3.00002V5.50002ZM15.0003 7.16669H5.00033V17.1667H15.0003V7.16669ZM7.50033 3.83335V5.50002H12.5003V3.83335H7.50033Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
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
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Tabel Histori Transaksi -->
    <h2 class="text-xl font-inter font-semibold my-4 mt-4">HISTORI TRANSAKSI</h2>
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
                <tbody class="text-gray-700 text-sm font-inter font-light">
                    @for ($i = 1; $i < 8; $i++)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center text-base font-inter">{{ $i }}</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Jenis Packaging Obat</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Margin</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Harga Jual</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Kuantiti</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Terjual</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Retur</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Buang</td>
                            <td class="py-3 px-6 text-center text-base font-inter">Subtotal</td>
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
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#"
                        class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
@endsection
