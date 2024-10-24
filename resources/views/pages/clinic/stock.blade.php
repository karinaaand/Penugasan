@extends('layouts.main')
@section('container')
<div class="container mx-auto p-4">
    <div class="flex justify-end mb-4">
        <input type="text" placeholder="Search" class="border rounded-full px-4 py-2">
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-2 px-4 text-left">NO</th>
                    <th class="py-2 px-4 text-left">KODE OBAT</th>
                    <th class="py-2 px-4 text-left">NAMA OBAT</th>
                    <th class="py-2 px-4 text-left">STOK KONVERSI</th>
                    <th class="py-2 px-4 text-left">EXP TERDEKAT</th>
                    <th class="py-2 px-4 text-left">STATUS</th>
                    <th class="py-2 px-4 text-left">ACTION </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">#AAA111</td>
                    <td class="py-2 px-4">OBAT 1</td>
                    <td class="py-2 px-4">...</td>
                    <td class="py-2 px-4">...</td>
                    <td class="py-2 px-4">...</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('clinic.stocks.show', 1) }}" class="inline-block">
                            <button class="bg-blue-200 p-2 rounded-full">
                                <i class="fas fa-eye text-blue-500"></i>
                                <img src="{{ asset('assets/Vector Eyes.png') }}" alt="Hapus" class="w-6 h-6">
                            </button>
                        </a>
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
