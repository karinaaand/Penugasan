@extends('layouts.main')
@section('container')
        <div class="bg-white p-8 rounded-lg border-2 border-gray-200 shadow-lg mb-8">
            <div class="mb-4 flex justify-center">
                <input type="text" placeholder="Inputkan nama" class="w-1/2 p-2 border-2 border-purple-400 rounded-md focus:outline-none focus:border-purple-600">
            </div>
            <div class="mb-4 flex justify-center">
                <input type="text" placeholder="Inputkan jumlah" class="w-1/6 p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-gray-400 text-center">
            </div>
            <div class="flex justify-center mt-16">
                <button class="w-1/4 bg-purple-500 text-white py-2 rounded-md hover:bg-purple-600">SIMPAN</button>
            </div>
        </div>

        <div class="bg-white p-8 rounded-lg border-2 border-gray-200 shadow-lg mb-8">
            <div class="mb-4 flex justify-end">
                <input type="text" placeholder="Pencarian obat" class="w-1/3 p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-gray-400">
            </div>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-2">NO</th>
                        <th class="p-2">#</th>
                        <th class="p-2">NAMA OBAT</th>
                        <th class="p-2">JUMLAH</th>
                        <th class="p-2">EXPIRED</th>
                        <th class="p-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2">1</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>


                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">2</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">3</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">4</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">5</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">6</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">7</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">8</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">9</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">10</td>
                        <td class="p-2 text-blue-500">#aaa1111</td>
                        <td class="p-2">Jordan Stevenson</td>
                        <td class="p-2">111</td>
                        <td class="p-2">22 Oct 2019</td>
                        <td class="p-2">
                            <div class="flex">
                                <button class="bg-red-500 text-white p-2 rounded-xl mx-4">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex flex-col items-end mt-4">
                <div class="flex items-end space-x-4 mb-4">
                    <div class="flex items-center space-x-1">
                        <button class="px-2 py-1 text-gray-500 bg-gray-200 rounded"><i class="fas fa-chevron-left"></i><</button>
                        <button class="px-2 py-1 text-blue-500 border border-blue-500 rounded">1</button>
                        <button class="px-2 py-1 text-gray-500 bg-gray-200 rounded">2</button>
                        <span class="px-2 py-1 text-gray-500">...</span>
                        <button class="px-2 py-1 text-gray-500 bg-gray-200 rounded">9</button>
                        <button class="px-2 py-1 text-gray-500 bg-gray-200 rounded">10</button>
                        <button class="px-2 py-1 text-gray-500 bg-gray-200 rounded"><i class="fas fa-chevron-right"></i>></button>
                    </div>
                </div>
                <button class="flex items-center justify-center w-1/8 px-4 py-2 text-white bg-green-400 rounded shadow-md hover:bg-green-500">
                    <i class="fas fa-save"></i>
                    <span class="ml-2">SAVE</span>
                </button>
            </div>

        </div>

@endsection
