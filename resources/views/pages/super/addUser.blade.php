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
            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Password">
        </div>
    <!-- Save Button -->
    <div class="flex justify-center">
        <button class="bg-blue-500 text-white px-8 py-2 rounded-lg hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" href="{{ route('user.index') }}" >SAVE</button>
    </div>

</div>

@endsection
