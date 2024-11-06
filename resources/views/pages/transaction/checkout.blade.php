@extends('layouts.main')
@section('container')
    <div class="rounded-lg p-6 shadow-lg">
        <div class="flex justify-between">
            <h1>
                Discount
                <span class="text-xs italic">(opsional)</span>
            </h1>
            <div class="flex w-1/2 justify-end gap-10">
                <div class="flex items-center justify-between gap-3">
                    <input type="radio" name="type_discount" id="persen" checked />
                    <label class="text-xl font-bold" for="persen">%</label>
                    <input type="radio" name="type_discount" id="erpe" />
                    <label class="text-xl font-bold" for="erpe">Rp</label>
                </div>
                <input
                    type="text"
                    name="discount"
                    placeholder="Discount"
                    class="w-3/4 rounded-md px-4 py-2 ring-1 ring-black"
                    id=""
                />
            </div>
        </div>
        <div class="mt-6 flex justify-between gap-4">
            <select class="w-4/5 rounded-md px-4 ring-1 ring-black" name="" id="">
                <option value="">Obat1</option>
                <option value="">Obat1</option>
                <option value="">Obat1</option>
            </select>
            <input
                type="number"
                name="discount"
                placeholder="Jumlah"
                class="w-1/5 rounded-md px-4 py-2 ring-1 ring-black"
                id=""
            />
        </div>
        <div class="mt-6 flex justify-center">
            <button class="w-max rounded-md px-64 py-2 ring-1 ring-gray-400 hover:bg-indigo">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 14V2H0V0H3C3.26522 0 3.51957 0.105357 3.70711 0.292893C3.89464 0.48043 4 0.734784 4 1V13H16.438L18.438 5H6V3H19.72C19.872 3 20.022 3.03466 20.1586 3.10134C20.2952 3.16801 20.4148 3.26495 20.5083 3.38479C20.6019 3.50462 20.6668 3.6442 20.6983 3.79291C20.7298 3.94162 20.7269 4.09555 20.69 4.243L18.19 14.243C18.1358 14.4592 18.011 14.6512 17.8352 14.7883C17.6595 14.9255 17.4429 15 17.22 15H3C2.73478 15 2.48043 14.8946 2.29289 14.7071C2.10536 14.5196 2 14.2652 2 14ZM4 21C3.46957 21 2.96086 20.7893 2.58579 20.4142C2.21071 20.0391 2 19.5304 2 19C2 18.4696 2.21071 17.9609 2.58579 17.5858C2.96086 17.2107 3.46957 17 4 17C4.53043 17 5.03914 17.2107 5.41421 17.5858C5.78929 17.9609 6 18.4696 6 19C6 19.5304 5.78929 20.0391 5.41421 20.4142C5.03914 20.7893 4.53043 21 4 21ZM16 21C15.4696 21 14.9609 20.7893 14.5858 20.4142C14.2107 20.0391 14 19.5304 14 19C14 18.4696 14.2107 17.9609 14.5858 17.5858C14.9609 17.2107 15.4696 17 16 17C16.5304 17 17.0391 17.2107 17.4142 17.5858C17.7893 17.9609 18 18.4696 18 19C18 19.5304 17.7893 20.0391 17.4142 20.4142C17.0391 20.7893 16.5304 21 16 21Z"
                        fill="#262B43"
                        fill-opacity="0.9"
                    />
                </svg>
            </button>
        </div>
        <div class="w-full p-6">
            <table class="w-full overflow-hidden rounded-lg border border-gray-300 shadow-md">
                <thead class="bg-gray-200">
                    <th class="py-4 text-center">NO</th>
                    <th class="py-4 text-center">NAMA BARANG</th>
                    <th class="py-4 text-center">JUMLAH</th>
                    <th class="py-4 text-center">HARGA SATUAN</th>
                    <th class="py-4 text-center">SUBTOTAL</th>
                    <th class="py-4 text-center">ACTION</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr class="border-b">
                            <td class="py-4 text-center">1</td>
                            <td class="py-4 text-center">Gatau Obat Apa</td>
                            <td class="py-4 text-center">Rp 10.000</td>
                            <td class="py-4 text-center">Rp 10.000</td>
                            <td class="py-4 text-center">Rp 10.000</td>
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
                    @endfor
                </tbody>
            </table>
            <h1 class="mx-44 mt-4 py-4 text-end text-xl">Total Harga : Rp 99.000</h1>
            <a
                href="{{ route('transaction.show', 1) }}"
                class="mt-4 inline-block w-full rounded-xl bg-lavender py-2 text-center font-bold text-white hover:bg-lavender-700"
            >
                Checkout
            </a>
        </div>
    </div>

    <script>
        function showDeleteToast() {
            const toastDelete = document.getElementById('toast-delete');
            toastDelete.classList.remove('hidden'); // Show delete toast
            setTimeout(() => {
                hideToast(); // Automatically hide after 3 seconds
            }, 3000);
        }

        function hideToast() {
            document.getElementById('toast-delete').classList.add('hidden'); // Hide delete toast
        }
    </script>
@endsection
