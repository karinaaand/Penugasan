@extends('layouts.main')
@section('container')

<div class="p-8">
    <div class="max-w-7xl mx-auto">

        <div class="mb-4">
            <a href="{{ route('clinic.inflows.create') }}" class="bg-green-500 text-white px-4 py-2 text-base rounded-lg flex items-center shadow" style="width: 125px;">
                <i class="fas fa-plus mr-1 text-xs"></i> + Tambah
            </a>
        </div>


        <div class="bg-white shadow-md rounded-lg overflow-hidden w-full">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left">NO</th>
                        <th class="py-3 px-4 text-left">KODE LPB</th>
                        <th class="py-3 px-4 text-left">NAMA VENDOR</th>
                        <th class="py-3 px-4 text-left">TGL MASUK</th>
                        <th class="py-3 px-4 text-left">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @for ($i = 1; $i <= 5; $i++)
                    <tr class="border-t">
                        <td class="py-3 px-4">{{ $i }}</td>
                        <td class="py-3 px-4">#AAA111</td>
                        <td class="py-3 px-4">VENDOR 1</td>
                        <td class="py-3 px-4">01-01-2001</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('clinic.inflows.show', 1) }}" class="bg-blue-100 text-blue-500 rounded-full p-2 shadow-md flex items-center justify-center" style="height: 40px; width: 40px; line-height: 40px;">
                                <i class="fas fa-eye"></i>
                                <img src="{{ asset('assets/Vector Eyes.png') }}" alt="Deskripsi Gambar" class="ml-1" style="height: 20px; width: 20px; vertical-align: middle;">
                            </a>
                        </td>
                    </tr>
                    @endfor
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
</div>

@endsection
