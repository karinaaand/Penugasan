@extends('layouts.main')
@section('container')
<div class="p-6 bg-white rounded-lg shadow-lg">
<h2 class="text-2xl font-bold mb-4">Manage Account</h2>

<div class="flex justify-between items-center mb-4">

    <!-- Add Button -->
    <a href="{{ route('user.create') }}">
        <button class="bg-green-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-green-600 transition-colors duration-200">+ Add User</button>
    </a>

     <!-- Search Input -->
     <input type="text" placeholder="Search" class="border rounded-full px-4 py-2">
</div>


    <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">NO</th>
                    <th class="py-3 px-6 text-center">USERNAME</th>
                    <th class="py-3 px-6 text-center">ROLE</th>
                    <th class="py-3 px-6 text-center">EMAIL</th>
                    <th class="py-3 px-6 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <!-- Data Row 1 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">1</td>
                    <td class="py-3 px-6 text-center">Lorem Ipsun</td>
                    <td class="py-3 px-6 text-center">Dokter</td>
                    <td class="py-3 px-6 text-center">loremIpsun@mail.com</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('user.edit',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                        <a href="{{ route('inventory.stocks.show',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Hapus</a>
                    </td>
                </tr>
                <!-- Data Row 2 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 text-center">Lorem Ipsun</td>
                    <td class="py-3 px-6 text-center">Dokter</td>
                    <td class="py-3 px-6 text-center">loremIpsun@mail.com</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('user.edit',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                        <a href="{{ route('inventory.stocks.show',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Hapus</a>
                    </td>
                </tr>
                <!-- Data Row 3 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 text-center">Lorem Ipsun</td>
                    <td class="py-3 px-6 text-center">Apoteker</td>
                    <td class="py-3 px-6 text-center">loremIpsun@mail.com</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('user.edit',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                        <a href="{{ route('inventory.stocks.show',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Hapus</a>
                    </td>
                </tr>
                <!-- Data Row 4 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">4</td>
                    <td class="py-3 px-6 text-center">Lorem Ipsun</td>
                    <td class="py-3 px-6 text-center">Super Admin</td>
                    <td class="py-3 px-6 text-center">loremIpsun@mail.com</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('user.edit',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                        <a href="{{ route('inventory.stocks.show',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Hapus</a>
                    </td>
                </tr>
                <!-- Data Row 5 -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 text-center">Lorem Ipsun</td>
                    <td class="py-3 px-6 text-center">Apoteker</td>
                    <td class="py-3 px-6 text-center">loremIpsun@mail.com</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('user.edit',1) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                        <a href="{{ route('inventory.stocks.show',1) }}" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
            <div class="flex justify-end">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection
