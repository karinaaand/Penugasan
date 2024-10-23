@extends('layouts.main')

@section('container')

<div class="container mx-auto mt-8">
    <!-- Header -->
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Daftar Obat</h1>

    <!-- Add Button and Search -->
    <div class="flex justify-between mb-4">
        <a href="{{ route('master.drug.create')}}" class="bg-green-500 text-white rounded hover:bg-green-600 px-6 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Obat
        </a>
        <input type="text" class="border border-gray-300 rounded p-2 w-1/3 ml-10" placeholder="Search">
    </div>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">NO</th>
                    <th class="py-3 px-6 text-left">KODE</th>
                    <th class="py-3 px-6 text-left">NAMA OBAT</th>
                    <th class="py-3 px-6 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @for ($i = 1; $i <= 10; $i++)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $i }}</td>
                    <td class="py-3 px-6 text-left">#AAA111</td>
                    <td class="py-3 px-6 text-left">Obat 1</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('master.drug.edit',1)}}" class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Detail
                        </a>
                        <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Delete
                        </button>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-end">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">1</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">9</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">10</a>
        </nav>
    </div>
</div>

@endsection
