@extends('layouts.main')
@section('container')
        <div class="bg-white p-8 rounded-lg border-2 border-gray-200 shadow-lg mb-8">
            <div class="mb-4 flex justify-center">
                <input type="text" placeholder="Inputkan nama" class="w-1/2 p-2 border-2 border-purple-400 rounded-md focus:outline-none focus:border-purple-600">
            </div>
            <div class="mb-4 flex justify-center">
                <input type="text" placeholder="Inputkan jumlah" class="w-1/6 p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-gray-400 text-center">
            </div>
            <div class="flex  justify-center mt-16">
                <button onclick="showToast()"  class="w-1/4 bg-purple-500 text-white py-2 rounded-md hover:bg-purple-600">SIMPAN</button>
            </div>
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

        <div class="bg-white p-8 rounded-lg border-2 border-gray-200 shadow-lg mb-8">
            <div class="mb-4 flex justify-end">
                <input type="text" placeholder="Pencarian obat" class="w-1/3 p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-gray-400">
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="p-2 text-center">NO</th>
                        <th class="p-2 text-center">#</th>
                        <th class="p-2 text-center">NAMA OBAT</th>
                        <th class="p-2 text-center">JUMLAH</th>
                        <th class="p-2 text-center">EXPIRED</th>
                        <th class="p-2 text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">1</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">2</td>
                        <td class="p-2 text-center  text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">3</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">4</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">5</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">6</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">7</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">8</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">9</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                    <tr class="border-b text-center">
                        <td class="p-2 text-center">10</td>
                        <td class="p-2 text-center text-blue-500">#aaa1111</td>
                        <td class="p-2 text-center">Jordan Stevenson</td>
                        <td class="p-2 text-center">111</td>
                        <td class="p-2 text-center">22 Oct 2019</td>
                        <td class="p-2 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="showDeleteToast()" class="bg-red-500 text-white p-2 rounded-xl">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar" class="inline-block" style="height: 20px; width: 20px; vertical-align: middle;">
                                </button>
                            </div>
                        </td>

                        <div id="toast-delete" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 top-5 right-5" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                            <button type="button" onclick="hideToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="flex flex-col items-end mt-4">
                <div class="flex justify-end items-center mt-4 gap-4">
                    <div class="text-sm">Showing 1 to 10 of 50 entries</div>
                        <!-- Pagination -->
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
                <div class="flex justify-end mt-4 gap-4">
                    <button onclick="showToast()" class="bg-green-500 text-white px-12 py-2 rounded-lg hover:bg-green-600">SAVE</button>
                </div>
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

                <!-- JavaScript for showing and hiding the toast -->
                <script>
                    function showToast() {
                        const toast = document.getElementById('toast-success');
                        toast.classList.remove('hidden'); // Show success toast
                        setTimeout(() => {
                            hideToast(); // Automatically hide after 3 seconds
                        }, 3000);
                    }

                    function showDeleteToast() {
                        const toastDelete = document.getElementById('toast-delete');
                        toastDelete.classList.remove('hidden'); // Show delete toast
                        setTimeout(() => {
                            hideToast(); // Automatically hide after 3 seconds
                        }, 3000);
                    }

                    function hideToast() {
                        document.getElementById('toast-success').classList.add('hidden'); // Hide success toast
                        document.getElementById('toast-delete').classList.add('hidden'); // Hide delete toast
                    }
                </script>

            </div>
        </div>
    </div>
@endsection
