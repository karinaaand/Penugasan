@extends('layouts.main')
@section('container')
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
                        <span class="text-green-500 font-bold">DONE</span>
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
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end p-4">
            <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700"><
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                <span class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">9</a>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">10</a>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">>
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection
