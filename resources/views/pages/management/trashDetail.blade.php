@extends('layouts.main')

@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-xl font inter font-semibold">Buang Obat</h2>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-lg font-inter text-gray-700">Nama Obat</label>
                <p class="mt-1 text-base font-inter text-gray-600">Paracetamol</p>
            </div>
            <div>
                <label class="block text-lg font-inter text-gray-700">Tanggal Expired</label>
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

        <div class="mt-4 flex justify-end">
            <button onclick="showToast()" class="rounded-lg bg-pink-500 px-6 py-2 text-white hover:bg-pink-600 text-base font-inter">
                Buang
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
            <div class="ml-3 text-sm font-normal">Berhasil dibuang.</div>
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
