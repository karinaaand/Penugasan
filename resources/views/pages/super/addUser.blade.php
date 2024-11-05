@extends('layouts.main')

@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4">Add Account</h2>

    <label class="block text-lg font-medium mb-2">USERNAME</label>
    <!-- Tambah Username -->
    <div class="mb-4 relative">
        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Username">
    </div>

    <label class="block text-lg font-medium mb-2">ROLE</label>
    <!-- Tambah Role -->
    <div class="mb-4 relative">
        <select class="border border-gray-300 p-3 rounded w-full">
            <option selected disabled>Inputkan Role</option>
            <option>Dokter</option>
            <option>Apoteker</option>
            <option>Super Admin</option>
        </select>
    </div>

    <label class="block text-lg font-medium mb-2">E-MAIL</label>
    <!-- Tambah Email -->
    <div class="mb-4 relative">
        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan E-mail">
    </div>

    <label class="block text-lg font-medium mb-2">PASSWORD</label>
    <!-- Tambah PASSWORD -->
    <div class="mb-4 relative">
        <input type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Password">
    </div>

    <!-- Save Button -->
    <div class="flex justify-center">
        <button id="save-button" class="bg-blue-500 text-white px-8 py-2 rounded-lg hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            SAVE
        </button>
    </div>

    <!-- Toast Success -->
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('save-button');

        saveButton.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi default jika ada
            showToast(); // Tampilkan toast
            // Di sini, Anda dapat melakukan panggilan AJAX atau pengalihan jika diperlukan
        });
    });

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
