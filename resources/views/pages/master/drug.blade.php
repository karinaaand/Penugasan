@extends('layouts.main')

@section('container')
    <div class="flex justify-between mb-4">
        <a href="{{ route('master.drug.create') }}">
            <button
                class="bg-green-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-green-600 transition-colors duration-200">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                + Tambah
            </button>
        </a>
        <input type="text" name="" id="" placeholder="Search..."
            class="ring-2 ring-gray-300 rounded-full px-6 py-2 mb-4">
    </div>
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
                @foreach ($drugs as $number => $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $number + 1 }}</td>
                        <td class="py-3 px-6 text-left">#{{ $item->code }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('master.drug.edit', $item->id) }}"
                                class="bg-blue-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Detail
                            </a>
                            <form action="{{ route('master.drug.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin dihapus?')" type="submit"
                                    class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
        <div class="flex justify-end">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#"
                    class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">
                    <</a>
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
