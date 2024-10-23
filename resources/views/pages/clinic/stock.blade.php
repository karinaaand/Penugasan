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
        <div class="flex justify-between items-center p-4">
            <div class="flex items-center ml-auto">
                <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-l"> < </button>
                <button class="bg-blue-500 text-white px-3 py-1">1</button>
                <button class="bg-gray-200 text-gray-600 px-3 py-1">2</button>
                <span class="px-3 py-1">...</span>
                <button class="bg-gray-200 text-gray-600 px-3 py-1">9</button>
                <button class="bg-gray-200 text-gray-600 px-3 py-1">10</button>
                <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-r"> > </button>
            </div>
        </div>
    </div>
</div>
@endsection
