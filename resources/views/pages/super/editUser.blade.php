@extends('layouts.main')
@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg w-1/2 mx-auto">
        <h2 class="mb-4 text-2xl font-bold">Manage Account</h2>
        
        <!-- Tambah Username -->
        <label class="mb-2 block text-lg font-medium">NAME</label>
        <div class="relative mb-4">
            <input type="text" class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan Username"/>
        </div>
        
        <!-- Tambah Role -->
        <label class="mb-2 block text-lg font-medium">ROLE</label>
        <div class="relative mb-4">
            <select class="w-full rounded border border-gray-300 p-3">
                <option selected disabled>Inputkan Role</option>
                <option>Dokter</option>
                <option>Apoteker</option>
                <option>Super Admin</option>
            </select>
        </div>

        <!-- Tambah Email -->
        <label class="mb-2 block text-lg font-medium">E-MAIL</label>
        <div class="relative mb-4">
            <input type="text" class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan E-mail"/>
        </div>

        <!-- Save Button -->
        <div class="flex justify-center">
            <button id="save-button" onclick="showSaveModal()" class="rounded-lg bg-blue-500 px-8 py-2 text-white transition duration-200 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >SAVE</button>
        </div>
    </div>
    <div id="saveModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Apakah Anda yakin ingin menyimpan transaksi ini?</p>
            <div class="flex justify-center space-x-4">
                    <button type="reset" onclick="return closeSaveModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                    <button type="button" onclick="submitForm()"
                        class="px-4 py-2 bg-green-500 text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </div>

                <!-- Toast Success -->
        <!-- session('success') -->
        <div id="toast-success" class="fixed hidden right-5 top-5 mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow light:bg-gray-800 light:text-gray-400" role="alert">
            <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 light:bg-green-800 light:text-green-200">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span></div>
            <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" onclick="" class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 light:bg-gray-800 light:text-gray-500 light:hover:bg-gray-700 light:hover:text-white"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

    @endsection
    <script>
    function showSaveModal() {
        document.getElementById('saveModal').classList.remove('hidden');
    }

    function closeSaveModal() {
        document.getElementById('saveModal').classList.add('hidden');
    }

    function submitForm() {
        closeSaveModal();
        showToast();
    }

    function showToast() {
        const toast = document.getElementById('toast-success');
        toast.classList.remove('hidden');
        setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        document.getElementById('toast-success').classList.add('hidden');
    }
</script>