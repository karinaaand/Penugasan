@extends('layouts.main')

@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-xl font-inter font-semibold">Retur Obat</h2>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-lg font-inter text-gray-700">Nama Obat</label>
                <p class="mt-1 text-base font-inter text-gray-600">Paracetamol</p>
            </div>
            <div>
                <label class="block text-lg  font-inter text-gray-700">Tanggal Expired</label>
                <p class="mt-1 text-base font-inter text-gray-600">20/12/2024</p>
            </div>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-lg font-inter text-gray-700">Jumlah Obat (pcs)</label>
                <input
                    type="number"
                    class="h-10 w-full text-base font-inter rounded border border-gray-300 p-4"
                    placeholder="Inputkan jumlah obat"
                />
            </div>
            <div>
                <label class="block text-lg font-inter text-gray-700">Deskripsi</label>
                <textarea
                    class="h-40 w-full text-base font-inter rounded border border-gray-300 p-4"
                    placeholder="Tuliskan alasan"
                    rows="4"
                ></textarea>
            </div>
        </div>
        <!-- Container for Toggle Switch, Text, and Save Button -->
        <div class="flex flex-col items-end space-y-1">
            <!-- Stack items vertically -->
            <div class="flex items-center justify-end space-x-12">
                <!-- Horizontal alignment for toggle and button -->
                <div class="flex items-center space-x-2">
                    <label class="relative inline-flex cursor-pointer items-center">
                        <input type="checkbox" class="peer sr-only" />
                        <div class="peer h-6 w-12 rounded-full bg-black peer-checked:bg-blue-500"></div>
                        <div
                            class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:translate-x-6"
                        ></div>
                    </label>
                    <span class="text-gray-500 text-base font-inter">Selesai</span>
                </div>
                <button
                    onclick="showToast()"
                    class="rounded-2xl bg-yellow-300 px-6 py-2 text-base font-bold font-inter text-black shadow-md transition-colors hover:bg-yellow-500"
                    style="width: 100px; height: 40px"
                >
                    SAVE
                </button>
            </div>
            <!-- Note directly below the toggle and button -->
            <div class="mx-28 mt-1 text-xs font-inter text-red-500">
                <!-- Adjust mt-* for spacing if needed -->
                *Klik apabila sudah retur
            </div>
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
    </div>

    <!-- JavaScript untuk menampilkan dan menyembunyikan toast -->
    <script>
        function showToast() {
            const toast = document.getElementById('toast-success');
            toast.classList.remove('hidden'); // Tampilkan toast
            setTimeout(() => {
                hideToast(); // Sembunyikan otomatis setelah 3 detik
            }, 3000);
        }

        function hideToast() {
            document.getElementById('toast-success').classList.add('hidden'); // Sembunyikan toast
        }
    </script>
@endsection
