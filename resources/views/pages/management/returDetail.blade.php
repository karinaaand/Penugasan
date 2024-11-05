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
    <!-- Container for Toggle Switch, Text, and Save Button -->
    <div class="flex flex-col items-end space-y-1"> <!-- Stack items vertically -->
        <div class="flex justify-end items-center space-x-12"> <!-- Horizontal alignment for toggle and button -->
            <div class="flex items-center space-x-2">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-12 h-6 bg-black rounded-full peer peer-checked:bg-blue-500"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-6"></div>
                </label>
                <span class="text-gray-500">Selesai</span>
            </div>
            <button onclick="showToast()" class="bg-yellow-400 text-black font-bold py-2 px-6 rounded-full shadow-md hover:bg-yellow-500 transition-colors" style="width: 100px; height: 40px;">
                SAVE
            </button>
        </div>
        <!-- Note directly below the toggle and button -->
        <div class="text-red-500 text-xs mt-1 mx-28"> <!-- Adjust mt-* for spacing if needed -->
            *Klik apabila sudah retur
        </div>
    </div>
    <div id="toast-success" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Berhasil disimpan.</div>
        <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</div>

<!-- JavaScript untuk menampilkan dan menyembunyikan toast -->
<script>
    function showToast() {
        const toast = document.getElementById('toast-success');
        toast.classList.remove('hidden'); // Tampilkan toast
        setTimeout(() => {
            hideToast(); // Sembunyikan otomatis setelah 3 detik
        }, 3000);
    }

    function hideToast() {
        document.getElementById('toast-success').classList.add('hidden'); // Sembunyikan toast
    }
</script>
@endsection
