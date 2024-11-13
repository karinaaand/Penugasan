@extends('layouts.main')
@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg w-1/2 mx-auto">
        <h2 class="mb-4 text-2xl font-bold">Add Account</h2>
        
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

        <label class="mb-2 block text-lg font-medium">PASSWORD</label>
        <!-- Tambah PASSWORD -->
        <div class="relative mb-4">
            <input type="password" class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan Password"/>
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
                        <a href="{{ route('user.index') }}">
                            <button type="button" onclick="submitForm()"
                        class="px-4 py-2 bg-green-500 text-white rounded-lg">Simpan</button></a>
            </div>
        </div>
    </div>
    @endsection
    <script>
    function showSaveModal() {
        document.getElementById('saveModal').classList.remove('hidden');
    }

    function closeSaveModal() {
        document.getElementById('saveModal').classList.add('hidden');
    }

    function redirectToUserIndex() {
        closeSaveModal();
        window.location.href = "{{ route('user.index') }}";
    }
</script>