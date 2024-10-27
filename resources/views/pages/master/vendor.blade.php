@extends('layouts.main')

@section('container')
    <a href="{{ route('master.vendor.create') }}" class="bg-indigo hover:bg-indigo-700 rounded-md p-2 text-white">+ Tambah</a>
    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">NO</th>
                    <th class="py-3 px-6 text-left">NAMA Vendor</th>
                    <th class="py-3 px-6 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <!-- Data Rows -->
                @foreach ($vendors as $number=>$item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $number+1 }}</td>
                    <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('master.vendor.edit',$item->id) }}" class="bg-yellow-300 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-400 transition-colors duration-200 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.586 2.586a2 2 0 00-2.828 0L7.757 9.414a2 2 0 00-.414.586L6 14l4-1.343a2 2 0 00.586-.414l6.829-6.829a2 2 0 000-2.828zM10 12L8 14l1.414-1.414L10 12zm1.586-1.414L16.293 6H14v-2h2.293l-4.707 4.707a1 1 0 00-.586.414z"/>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('master.vendor.destroy',$item->id) }}" class="inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin dihapus?')" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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

@endsection
