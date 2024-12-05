@extends('layouts.form')
@section('container')
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-semibold text-center text-gray-800">Lupa Sandi</h2>
        <form action="{{ route('user.password') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="email">
                    Email Anda
                </label>
                <input
                    class="w-full px-3 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="email" name="email" type="email" />
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="email">
                    Password Baru
                </label>
                <input
                    class="w-full px-3 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="password" type="password" />
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="email">
                    Konfirmasi Password
                </label>
                <input
                    class="w-full px-3 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="password_confirmation" type="password" />
            </div>
            <div class="flex justify-center">
                <button
                    class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    type="submit">
                    Konfirmasi
                </button>
            </div>
        </form>
    </div>
@endsection
