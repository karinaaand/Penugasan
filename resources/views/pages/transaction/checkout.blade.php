@extends('layouts.main')
@section('container')
    <div class="flex gap-6">
        <div class="rounded-lg p-6 shadow-lg">
            <div class="flex gap-6">
                <div>
                    <h1>Discount Transaksi</h1>
                    <div class="flex gap-4 items-center mt-3">
                        <div class="flex flex-col w-8">
                            <div class="flex justify-between">
                                <label class="text-xs font-normal" for="">Rp</label>
                                <input type="radio" name="discount" id="">

                            </div>
                            <div class="flex justify-between">
                                <label class="text-xs font-normal" for="">%</label>
                                <input type="radio" name="discount" id="">

                            </div>
                        </div>
                        <input type="text" name="discount" placeholder="Discount"
                            class="w-24 rounded-md px-3 py-2 border border-gray-300" />

                    </div>
                </div>
                <div>
                    <h1>Discount Obat</h1>
                    <div class="flex gap-2 items-center mt-3">
                        <div class="flex">
                            <input type="number"
                                class="rounded-none rounded-s-lg bg-gray-100 border cursor-not-allowed border-gray-300 text-gray-500 block w-20 text-sm p-2.5"
                                value="10" disabled>
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                %
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="rounded-lg p-6 shadow-lg flex flex-col justify-between w-full">
            <div class="flex gap-3">
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        Stok
                    </span>
                    <input type="number"
                        class="rounded-none rounded-e-md bg-gray-100 border cursor-not-allowed border-gray-300 text-gray-500 block w-16 text-sm px-3 py-1"
                        value="10" disabled>
                </div>
                <input type="text" name="discount" placeholder="Nama Item"
                    class="rounded-md px-3 py-1w-fulls ring-1 ring-gray" />
                <input type="text" name="discount" placeholder="0" class="w-20 rounded-md px-3 py-1 ring-1 ring-gray" />


            </div>
            <button class="w-full rounded-md bg-indigo-400 hover:bg-indigo-600 py-1 font-bold text-white">Tambah</button>
        </div>

    </div>
    <div class="rounded-lg p-6 shadow-lg mt-6">
        <div class="w-full">
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
                    <tr class="border-b">
                        <td class="py-4 text-center">1</td>
                        <td class="py-4 text-center">Gatau Obat Apa</td>
                        <td class="py-4 text-center">Rp 10.000</td>
                        <td class="py-4 text-center">Rp 10.000</td>
                        <td class="py-4 text-center">Rp 10.000</td>
                        <td class="px-6 py-3 text-center">
                            <div class="flex items-center justify-center">
                                <button onclick="" class="rounded-xl bg-red-500 p-2 text-white">
                                    <i class="fas fa-trash"></i>
                                    <img src="{{ asset('assets/Vector sampah.png') }}" alt="Deskripsi Gambar"
                                        class="inline-block" style="height: 20px; width: 20px; vertical-align: middle" />
                                </button>
                            </div>
                        </td>


                    </tr>
                </tbody>
            </table>
            <a href="{{ route('transaction.show', 1) }}"
                class="mt-4 inline-block w-full rounded-xl bg-indigo-500 py-2 text-center font-bold text-white hover:bg-lavender-700">
                Checkout
            </a>
        </div>
    </div>

    <script></script>
@endsection
