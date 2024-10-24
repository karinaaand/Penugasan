@extends('layouts.main')
@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <div class="flex items-center justify-right mb-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mr-4">Upload</button>
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Template</button>
    </div>
    <form class="space-y-4">
        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <select class="border border-gray-300 p-3 rounded w-full">
                <option selected disabled>Inputkan vendor</option>
                <option>Vendor 1</option>
                <option>Vendor 2</option>
            </select>
            <div></div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <select class="border border-gray-300 p-2 rounded w-full">
                <option selected disabled>Bayar Langsung / Bayar Tempo</option>
                <option>Bayar Langsung</option>
                <option>Bayar Tempo</option>
            </select>
            <input type="date" class="border border-gray-300 p-2 rounded w-full" placeholder="Masukkan tanggal tempo">
        </div>
        <div class="grid grid-cols-1 gap-4">
            <input type="text" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan nama">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="grid grid-cols-3 gap-4">
                <input type="number" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan ukuran">
                <select class="border border-gray-300 p-2 rounded w-full">
                    <option selected disabled>Inputkan ukuran</option>
                    <option>ml</option>
                    <option>Pcs</option>
                </select>
                <input type="number" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan jumlah item">
            </div>
            <input type="date" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan expired obat">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="grid grid-cols-2 gap-4">
                <input type="number" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan harga beli">
                <input type="number" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan harga jual">
            </div>
            <input type="number" class="border border-gray-300 p-2 rounded w-full" placeholder="Inputkan harga jual">
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-purple-500 text-white px-20 py-2 rounded-lg hover:bg-purple-600">SIMPAN</button>
        </div>
    </form>

    <div class="mt-8">
        <div class="flex justify-between items-left mb-4">
            <input type="text" class="border border-gray-300 p-2 rounded-lg w-1/3 ml-auto" placeholder="Search">
        </div>

        <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Kode Obat</th>
                        <th class="border p-2">Nama Obat</th>
                        <th class="border p-2">Jumlah</th>
                        <th class="border p-2">Expired</th>
                        <th class="border p-2">Action</th>
                    </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <!-- Data Row 1 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">1</td>
                    <td class="py-3 px-6 text-center">#AAA111</td>
                    <td class="py-3 px-6 text-center">Vendor 1</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">01-01-2001</td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('inventory.inflows.show',1)}}">
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Delete</button>
                    </td>
                </tr>
                <!-- Data Row 2 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 text-center">#AAA111</td>
                    <td class="py-3 px-6 text-center">Vendor 1</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">01-01-2001</td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('inventory.inflows.show',1)}}">
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Delete</button>
                    </td>
                </tr>
                <!-- Data Row 3 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 text-center">#AAA111</td>
                    <td class="py-3 px-6 text-center">Vendor 1</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">01-01-2001</td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('inventory.inflows.show',1)}}">
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Delete</button>
                    </td>
                </tr>
                <!-- Data Row 4 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">4</td>
                    <td class="py-3 px-6 text-center">#AAA111</td>
                    <td class="py-3 px-6 text-center">Vendor 1</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">01-01-2001</td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('inventory.inflows.show',1)}}">
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Delete</button>
                    </td>
                </tr>
                <!-- Data Row 5 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 text-center">#AAA111</td>
                    <td class="py-3 px-6 text-center">Vendor 1</td>
                    <td class="py-3 px-6 text-center">100</td>
                    <td class="py-3 px-6 text-center">01-01-2001</td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('inventory.inflows.show',1)}}">
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Delete</button>
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
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
        <div class="flex justify-end mt-4 gap-4">
            <button class="bg-green-500 text-white px-12 py-2 rounded-lg hover:bg-green-600" href="{{ route('inventory.inflows.show', 1) }}">SAVE</button>
        </div>
    </div>
</div>
@endsection
