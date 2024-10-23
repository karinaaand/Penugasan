@extends('layouts.main')

@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-xl font-semibold mb-4">Retur Obat</h2>
    
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Obat</label>
            <p class="mt-1 text-gray-600">Paracetamol</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal Expired</label>
            <p class="mt-1 text-gray-600">20/12/2024</p>
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Jumlah Obat (pcs)</label>
            <input type="number" class="border border-gray-300 p-4 rounded w-full h-10" placeholder="Inputkan jumlah obat">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea class="border border-gray-300 p-4 rounded w-full h-40" placeholder="Tuliskan alasan" rows="4"></textarea>
        </div>
    </div>
    
    <div class="flex justify-end mt-4 items-center gap-3">
        
<label class="inline-flex items-center cursor-pointer">
  <input type="checkbox" value="" class="sr-only peer">
  <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Selesai</span>
</label>

        <button class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">Save</button>
    </div>
</div>
@endsection
