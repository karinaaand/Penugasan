@extends('layouts.form')
@section('container')
    <div class="w-96 rounded-xl p-12 shadow-lg ring-black">
        <h1 class="mb-8 text-center text-3xl font-bold">Forgot Password</h1>
        <form action="">
            <div class="mb-5">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Your email</label>
                <input
                    type="email"
                    id="email"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="name@flowbite.com"
                    required
                />
            </div>
            <div class="mb-5">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Your password</label>
                <input
                    type="passsword"
                    id="email"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="name@flowbite.com"
                    required
                />
            </div>
            <button type="submit" class="w-full rounded-full bg-lavender py-2 text-white hover:bg-lavender-700">
                Log In
            </button>
            <h1 class="mt-3 text-center">
                <a href="{{ route('user.forgot') }}" class="m-auto text-center text-xs hover:underline">Lupa sandi?</a>
            </h1>
        </form>
    </div>
@endsection
