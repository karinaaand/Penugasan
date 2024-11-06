@extends('layouts.main')
@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <div class="justify-right mb-4 flex items-center">
            <button class="mr-4 rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Upload</button>
            <button class="rounded-lg bg-green-500 px-4 py-2 text-white hover:bg-green-600">Template</button>
        </div>
        <form class="space-y-4">
            <div class="grid grid-cols-3 gap-4">
                <div></div>
                <select class="w-full rounded border border-gray-300 p-3">
                    <option selected disabled>Inputkan vendor</option>
                    <option>Vendor 1</option>
                    <option>Vendor 2</option>
                </select>
                <div></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <select class="w-full rounded border border-gray-300 p-2">
                    <option selected disabled>Bayar Langsung / Bayar Tempo</option>
                    <option>Bayar Langsung</option>
                    <option>Bayar Tempo</option>
                </select>
                <input
                    type="date"
                    class="w-full rounded border border-gray-300 p-2"
                    placeholder="Masukkan tanggal tempo"
                />
            </div>
            <div class="grid grid-cols-1 gap-4">
                <input type="text" class="w-full rounded border border-gray-300 p-2" placeholder="Inputkan nama" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-cols-3 gap-4">
                    <input
                        type="number"
                        class="w-full rounded border border-gray-300 p-2"
                        placeholder="Inputkan ukuran"
                    />
                    <select class="w-full rounded border border-gray-300 p-2">
                        <option selected disabled>Inputkan ukuran</option>
                        <option>ml</option>
                        <option>Pcs</option>
                    </select>
                    <input
                        type="number"
                        class="w-full rounded border border-gray-300 p-2"
                        placeholder="Inputkan jumlah item"
                    />
                </div>
                <input
                    type="date"
                    class="w-full rounded border border-gray-300 p-2"
                    placeholder="Inputkan expired obat"
                />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-4">
                    <input
                        type="number"
                        class="w-full rounded border border-gray-300 p-2"
                        placeholder="Inputkan harga beli"
                    />
                    <input
                        type="number"
                        class="w-full rounded border border-gray-300 p-2"
                        placeholder="Inputkan harga jual"
                    />
                </div>
                <input
                    type="number"
                    class="w-full rounded border border-gray-300 p-2"
                    placeholder="Inputkan harga jual"
                />
            </div>
            <div class="flex justify-center">
                <button
                    onclick="showToast()"
                    type="submit"
                    class="rounded-lg bg-purple-500 px-20 py-2 text-white hover:bg-purple-600"
                >
                    SIMPAN
                </button>
            </div>
            <div
                id="toast-success"
                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                role="alert"
            >
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                        />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">Berhasil disimpan.</div>
                <button
                    type="button"
                    onclick="hideToast()"
                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                    aria-label="Close"
                >
                    <span class="sr-only">Close</span>
                    <svg
                        class="h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
                    </svg>
                </button>
            </div>
        </form>

        <div class="mt-8">
            <div class="items-left mb-4 flex justify-between">
                <input type="text" class="ml-auto w-1/3 rounded-lg border border-gray-300 p-2" placeholder="Search" />
            </div>

            <!-- Table -->
            <div class="overflow-hidden rounded-lg bg-white shadow-md">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-200 text-sm uppercase leading-normal text-black">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode Obat</th>
                            <th class="border p-2">Nama Obat</th>
                            <th class="border p-2">Jumlah</th>
                            <th class="border p-2">Expired</th>
                            <th class="border p-2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-700">
                        <!-- Data Row 1 -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-center">1</td>
                            <td class="px-6 py-3 text-center">#AAA111</td>
                            <td class="px-6 py-3 text-center">Vendor 1</td>
                            <td class="px-6 py-3 text-center">100</td>
                            <td class="px-6 py-3 text-center">01-01-2001</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <button onclick="showDeleteToast()" class="rounded-xl bg-red-500 p-2 text-white">
                                        <i class="fas fa-trash"></i>
                                        <img
                                            src="{{ asset('assets/Vector sampah.png') }}"
                                            alt="Deskripsi Gambar"
                                            class="inline-block"
                                            style="height: 20px; width: 20px; vertical-align: middle"
                                        />
                                    </button>
                                </div>
                            </td>

                            <div
                                id="toast-delete"
                                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert"
                            >
                                <div
                                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                        />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                                <button
                                    type="button"
                                    onclick="hideToast()"
                                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="h-3 w-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </tr>
                        <!-- Data Row 2 -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-center">2</td>
                            <td class="px-6 py-3 text-center">#AAA111</td>
                            <td class="px-6 py-3 text-center">Vendor 1</td>
                            <td class="px-6 py-3 text-center">100</td>
                            <td class="px-6 py-3 text-center">01-01-2001</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <button onclick="showDeleteToast()" class="rounded-xl bg-red-500 p-2 text-white">
                                        <i class="fas fa-trash"></i>
                                        <img
                                            src="{{ asset('assets/Vector sampah.png') }}"
                                            alt="Deskripsi Gambar"
                                            class="inline-block"
                                            style="height: 20px; width: 20px; vertical-align: middle"
                                        />
                                    </button>
                                </div>
                            </td>

                            <div
                                id="toast-delete"
                                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert"
                            >
                                <div
                                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                        />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                                <button
                                    type="button"
                                    onclick="hideToast()"
                                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="h-3 w-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </tr>
                        <!-- Data Row 3 -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-center">3</td>
                            <td class="px-6 py-3 text-center">#AAA111</td>
                            <td class="px-6 py-3 text-center">Vendor 1</td>
                            <td class="px-6 py-3 text-center">100</td>
                            <td class="px-6 py-3 text-center">01-01-2001</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <button onclick="showDeleteToast()" class="rounded-xl bg-red-500 p-2 text-white">
                                        <i class="fas fa-trash"></i>
                                        <img
                                            src="{{ asset('assets/Vector sampah.png') }}"
                                            alt="Deskripsi Gambar"
                                            class="inline-block"
                                            style="height: 20px; width: 20px; vertical-align: middle"
                                        />
                                    </button>
                                </div>
                            </td>

                            <div
                                id="toast-delete"
                                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert"
                            >
                                <div
                                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                        />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                                <button
                                    type="button"
                                    onclick="hideToast()"
                                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="h-3 w-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </tr>
                        <!-- Data Row 4 -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-center">4</td>
                            <td class="px-6 py-3 text-center">#AAA111</td>
                            <td class="px-6 py-3 text-center">Vendor 1</td>
                            <td class="px-6 py-3 text-center">100</td>
                            <td class="px-6 py-3 text-center">01-01-2001</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <button onclick="showDeleteToast()" class="rounded-xl bg-red-500 p-2 text-white">
                                        <i class="fas fa-trash"></i>
                                        <img
                                            src="{{ asset('assets/Vector sampah.png') }}"
                                            alt="Deskripsi Gambar"
                                            class="inline-block"
                                            style="height: 20px; width: 20px; vertical-align: middle"
                                        />
                                    </button>
                                </div>
                            </td>

                            <div
                                id="toast-delete"
                                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert"
                            >
                                <div
                                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                        />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                                <button
                                    type="button"
                                    onclick="hideToast()"
                                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="h-3 w-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </tr>
                        <!-- Data Row 5 -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-center">5</td>
                            <td class="px-6 py-3 text-center">#AAA111</td>
                            <td class="px-6 py-3 text-center">Vendor 1</td>
                            <td class="px-6 py-3 text-center">100</td>
                            <td class="px-6 py-3 text-center">01-01-2001</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <button onclick="showDeleteToast()" class="rounded-xl bg-red-500 p-2 text-white">
                                        <i class="fas fa-trash"></i>
                                        <img
                                            src="{{ asset('assets/Vector sampah.png') }}"
                                            alt="Deskripsi Gambar"
                                            class="inline-block"
                                            style="height: 20px; width: 20px; vertical-align: middle"
                                        />
                                    </button>
                                </div>
                            </td>

                            <div
                                id="toast-delete"
                                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert"
                            >
                                <div
                                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                                        />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal">Berhasil dihapus.</div>
                                <button
                                    type="button"
                                    onclick="hideToast()"
                                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="h-3 w-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 flex items-center justify-end gap-4">
                <div class="text-sm">Showing 1 to 10 of 50 entries</div>
                <!-- Pagination -->
                <div class="flex justify-end">
                    <nav class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a
                            href="#"
                            class="rounded-l-md border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100"
                        >
                            <
                        </a>
                        <a href="#" class="border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100">
                            1
                        </a>
                        <a href="#" class="border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100">
                            2
                        </a>
                        <a href="#" class="border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100">
                            ...
                        </a>
                        <a href="#" class="border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100">
                            10
                        </a>
                        <a
                            href="#"
                            class="rounded-r-md border border-gray-300 bg-white px-3 py-2 text-gray-500 hover:bg-gray-100"
                        >
                            >
                        </a>
                    </nav>
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-4">
                <button onclick="showToast()" class="rounded-lg bg-green-500 px-12 py-2 text-white hover:bg-green-600">
                    SAVE
                </button>
            </div>
            <div
                id="toast-success"
                class="fixed right-5 top-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                role="alert"
            >
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                        />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">Berhasil disimpan.</div>
                <button
                    type="button"
                    onclick="hideToast()"
                    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                    aria-label="Close"
                >
                    <span class="sr-only">Close</span>
                    <svg
                        class="h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
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
@endsection
