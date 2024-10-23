@extends('layouts.main') 
@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
<h2 class="text-2xl font-bold mb-4">Manage Account</h2>
<label class="block text-lg font-medium mb-2">USERNAME</label>

    <!-- Username Section -->
    <div class="mb-8 flex items-center">
        <p class="text-gray-600 mr-2">Your username is <span class="font-semibold text-gray-800">superadmin</span></p>
        <a href="#" class="text-blue-500 hover:underline text-sm">Change</a>
    </div>

    <!-- Password Section -->
    <div class="mb-8">
        <label class="block text-lg font-medium mb-2">PASSWORD</label>
        <!-- Current Password -->
        <div class="mb-4 relative">
            <p class="text-gray-600 mr-2">Current password</span></p>
            <input type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3-3m-3 3l3 3"/>
                </svg>
            </span>
        </div>
        <!-- New Password -->
        <div class="mb-4 relative">
            <p class="text-gray-600 mr-2">New password</span></p>
            <input type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3-3m-3 3l3 3"/>
                </svg>
            </span>
        </div>
        <!-- Confirm Password -->
        <div class="relative">
            <p class="text-gray-600 mr-2">Confirm password</span></p>
            <input type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3-3m-3 3l3 3"/>
                </svg>
            </span>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-center">
        <button class="bg-blue-500 text-white px-8 py-2 rounded-lg hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" href="{{ route('user.index') }}" >SAVE</button>
    </div>

</div>

@endsection
