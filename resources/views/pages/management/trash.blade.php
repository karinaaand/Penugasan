@extends('layouts.main')

@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-xl font-semibold mb-4">Buang Obat</h2>
    
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
    
    <div class="flex justify-end mt-4">
        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600">Buang</button>
    </div>
</div>
@endsection
