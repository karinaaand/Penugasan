@extends('layouts.main')

@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
        <p class=" mb-6 text-black">Pastikan profil klinik sudah sesuai dengan keadaan sekarang.</p>

        <!-- Avatar Section -->
        <div class="flex items-center mb-4">
            <div class="w-40 h-40 rounded-full bg-gray-700 overflow-hidden">
                <img src="https://via.placeholder.com/64" alt="Avatar" class="object-cover w-full h-full">
            </div>
            <div class="ml-4">
                <button onclick="uploadModal()" class="bg-blue-600 text-sm text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                    Pilih gambar
                </button>
                <p class="text-gray-400 text-xs mt-1">JPG, GIF or PNG. 1MB max.</p>
            </div>
        </div>

        <!-- Input Fields -->
        <div class="mb-4">
            <div>
                <label class="block text-black text-lg font-semibold mb-1">Nama</label>
                <input type="name" class="w-full px-3 py-2 bg-white text-black border border-gray-300 rounded-lg ring-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-black text-lg font-semibold mb-1">Alamat</label>
            <input type="addres" class="w-full px-3 py-2 bg-white text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-black text-lg font-semibold mb-1">No. handphone</label>
            <input type="phone" class="w-full px-3 py-2 bg-white text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Save Button -->
        <div class="flex justify-end space-x-4"> 
            <button onclick="saveModal()" type="button" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                Simpan
            </button>
        </div>
    </div>
    <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative">
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" onclick="closeUploadModal()">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="flex items-center justify-center w-full mb-6 mt-6">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 gray:hover:bg-gray-800 gray:bg-gray-700 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">File format .xls (Max. 10Mb)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div> 
            <div class="flex justify-center space-x-4">
                <button onclick="closeUploadModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none">
                    Batal
                </button>
                <button onclick="submitModal()" type="button" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                    Tambah
                </button>
            </div>
        </div>
    </div>
    <div id="saveModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative">
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" onclick="closeSaveModal()">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Apakah Anda yakin ingin menyimpan perubahan ini?</h3>
                <p class="text-sm text-gray-500 mb-5">Pastikan semua data sudah benar sebelum menyimpan.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <button onclick="closeSaveModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none">
                    Batal
                </button>
                <button onclick="submitForm()" type="button" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none">
                    Simpan
                </button>
            </div>
        </div>
    </div>
@endsection
<script>
    function uploadModal() {
        document.getElementById('uploadModal').classList.remove('hidden');
    }
    function closeUploadModal() {
        document.getElementById('uploadModal').classList.add('hidden');
    }
    function saveModal() {
        document.getElementById('saveModal').classList.remove('hidden');
    }
    function closeSaveModal() {
        document.getElementById('saveModal').classList.add('hidden');
    }
</script>
