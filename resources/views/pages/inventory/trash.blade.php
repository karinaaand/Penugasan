@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg grid grid-cols-2">
        <div class="flex flex-col gap-6">
            <div>
                <label class="block font-bold text-gray-700">Nama Obat</label>
                <p class="mt-1 text-gray-600">{{ $batch->drug()->name }}</p>
            </div>
            <div>
                <label class="block font-bold text-gray-700">Produsen</label>
                <p class="mt-1 text-gray-600">{{ $batch->drug()->manufacture()->name }}</p>
            </div>
            <div>
                <label class="block font-bold text-gray-700">Tanggal Expired</label>
                <p class="mt-1 text-gray-600">{{ Carbon::parse($batch->expired)->translatedFormat('j F Y') }}</p>
            </div>
            <div>
                <label class="block font-bold text-gray-700">Tanggal Diterima</label>
                <p class="mt-1 text-gray-600">{{ Carbon::parse($batch->created_at)->translatedFormat('j F Y') }}</p>
            </div>
        </div>
        <div class="flex flex-col gap-6">
            <div>
                <label class="block font-bold text-gray-700">Vendor Pengirim</label>
                <p class="mt-1 text-gray-600">{{ $batch->transaction()->first()->vendor()->name }}</p>
            </div>
            <div class="flex">
                <input type="number" id="inputQuantity" name="inputQuantity"
                    class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full p-2.5"
                    placeholder="0">
                <span
                    class="inline-flex items-center px-3 text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                    pcs
                </span>
            </div>
            <textarea name="inputReason" rows="4"
                class="block p-3 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Tuliskan alasan..."></textarea>
            <div class="flex justify-end">
                <button onclick="showDeleteModal()"
                    class="py-2 px-4 rounded-md bg-red-500 hover:bg-red-700 text-white">Buang</button>
            </div>
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Anda yakin untuk menghapus data ini?
            </p>
            <div class="flex justify-center space-x-4">
                <form id="deleteForm" method="POST" action="{{ route('inventory.trash', $batch->id) }}" class="inline">
                    @csrf
                    <input type="hidden" name="quantity">
                    <input type="hidden" name="reason">
                    <button type="reset" onclick="return closeDeleteModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.querySelector('input[name=quantity]').value = document.querySelector('input[name=inputQuantity]').value
            document.querySelector('input[name=reason]').value = document.querySelector('textarea[name=inputReason]').value
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
