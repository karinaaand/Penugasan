@extends('layouts.main')
@section('container')

<div class="bg-white shadow-md rounded-xl p-6 w-full max-w-8xl">
    <!-- Form lainnya dan tabel -->
    <form action="" class="flex flex-row justify-between w-max gap-3">
        <input class="ring-2 ring-gray-500 py-1 px-2 rounded-sm" type="date" name="" id="">
        <h1>sampai</h1>
        <input class="ring-2 ring-gray-500 py-1 px-2 rounded-sm" type="date" name="" id="">
        <button class="bg-indigo px-2 py-1 rounded-full text-white font-bold text-xs hover:bg-indigo-800" type="submit">APPLY</button>
    </form>

    <div class="flex justify-end">
        <form action="">
            <input type="text" name="" id="" placeholder="Search..." class="ring-2 ring-gray-300 rounded-full px-6 py-2 mb-12">
        </form>
    </div>

<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">NO</th>
                    <th class="py-3 px-6 text-left">KODE RETUR</th>
                    <th class="py-3 px-6 text-left">NAMA OBAT</th>
                    <th class="py-3 px-6 text-left">JUMLAH BARANG</th>
                    <th class="py-3 px-6 text-left">TGL RETUR</th>
                    <th class="py-3 px-6 text-left">STATUS</th>
                    <th class="py-3 px-6 text-left">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">1</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">VENDOR 1</td>
                    <td class="py-3 px-6 text-left">10</td>
                    <td class="py-3 px-6 text-left">01-01-2001</td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ route('management.retur.show', 1) }}" class="bg-orange-500 text-white py-1 px-3 rounded-full text-xs">
                            ONGOING
                        </a>
                    </td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('management.retur.show',1)}}">
                        <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">View</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">2</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">VENDOR 1</td>
                    <td class="py-3 px-6 text-left">10</td>
                    <td class="py-3 px-6 text-left">01-01-2001</td>
                    <td class="py-3 px-6 text-left">
                        <span class="bg-orange-500 text-white py-1 px-3 rounded-full text-xs">ONGOING</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('management.retur.show',1)}}">
                        <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">View</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">3</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">VENDOR 1</td>
                    <td class="py-3 px-6 text-left">10</td>
                    <td class="py-3 px-6 text-left">01-01-2001</td>
                    <td class="py-3 px-6 text-left">
                        <span class="text-green-500 font-bold">DONE</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('management.retur.show',1)}}">
                        <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">View</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">4</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">VENDOR 1</td>
                    <td class="py-3 px-6 text-left">10</td>
                    <td class="py-3 px-6 text-left">01-01-2001</td>
                    <td class="py-3 px-6 text-left">
                        <span class="text-green-500 font-bold">DONE</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('management.retur.show',1)}}">
                        <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">View</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">5</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">VENDOR 1</td>
                    <td class="py-3 px-6 text-left">10</td>
                    <td class="py-3 px-6 text-left">01-01-2001</td>
                    <td class="py-3 px-6 text-left">
                        <span class="text-green-500 font-bold">DONE</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                    <a href="{{ route('management.retur.show',1)}}">
                        <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
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
