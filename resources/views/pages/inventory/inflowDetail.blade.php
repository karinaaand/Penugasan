@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')
@section('container')
<div class="mb-4 flex items-center">
            <div id="printOptions" class="mb-4 hidden ml-5">
                <label for="format" class="text-lg font-semibold">Pilih format cetak:</label>
                <select id="format" class="ml-2 rounded-md border">
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                </select>
                <button id="confirmPrint" class="ml-2 rounded-lg bg-green-500 px-4 py-2 font-bold text-white">
                    Download
                </button>
            </div>
            <div class="flex flex-1 justify-end mr-5">
                <button id="printButton" class="rounded-lg bg-yellow-400 px-4 py-2 font-bold text-black">CETAK</button>
            </div>
        </div>
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <div class="mb-4 flex items-center">
            <div class="flex-1 mr-5">
                    <h2 class="text-2xl font-bold text-left">Klinik Dokter hewan Hendrik</h2>
                <h2 class="text text-left">Pakuwon Asri, Jl. Sadewa No.3, Karangtengah Lor, Kaliwungu, Kendal, Jawa Tengah 51372</h2>
                <h2 class="text text-left">085290078739</h2>
            </div>
            <div class="flex-[1.5] flex flex-col  items-center justify-center">
                <div class="flex items-center">
                    <span class="mr-2 text-lg font-normal text-black">No. LPB :</span>
                    <span class="text-lg font-normal">{{ $transaction->code }}</span>
                </div>
                <h1 class="text-center text-3xl font-bold">LAPORAN PENERIMAAN BARANG</h1>

                <!-- <p class="text-gray-600">Tanggal : {{ Carbon::parse($transaction->created_at)->translatedFormat('j F Y') }}</p> -->
            </div>
            <div class="flex-1 ml-10">
                <p class="text-lg mb-4 text-left">Tanggal: {{ Carbon::parse($transaction->created_at)->translatedFormat('j F Y') }}</p>
                <h2 class="text-2xl font-bold text-left">{{ $transaction->vendor()->name }}</h2>
                <h2 class="text-lg text-left">{{ $transaction->vendor()->address }}</h2>
                <h2 class="text-lg text-left">{{ $transaction->vendor()->phone }}</h2>
            </div>
        </div>


        <div class="mb-4 flex items-center justify-between">
            <p class="mb-0 mr-2 text-lg font-semibold">Diterima</p>        </div>

        <!-- Table -->
        <div class="overflow-hidden rounded-lg bg-white shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-sm uppercase leading-normal text-black">
                        <th class="border p-2 w-1">No</th>
                        <th class="border p-2">Kode Obat</th>
                        <th class="border p-2">Nama Obat</th>
                        <th class="border p-2">Jumlah</th>
                        <th class="border p-2">Harga Satuan</th>
                        <th class="border p-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-light text-gray-700">
                    @foreach ($details as $number=>$item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center">{{ $number+1 }}</td>
                        <td class="px-6 py-3 text-center">{{ $item->drug()->code }}</td>
                        <td class="px-6 py-3 text-left">{{ $item->drug()->name }}</td>
                        <td class="px-6 py-3 text-center">{{ $item->quantity }}</td>
                        <td class="px-6 py-3 text-center">{{ 'Rp ' . number_format($item->piece_price, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-center">{{ 'Rp ' . number_format($item->total_price, 0, ',', '.') }}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex items-center justify-end">
            <p class="mr-2 font-semibold">Grand total :</p>
            <input
                type="text"
                value="{{ 'Rp ' . number_format($transaction->outcome, 0, ',', '.') }}"
                class="w-48 border-b border-gray-400 text-center focus:border-black focus:outline-none"
                readonly
            />
        </div>
    </div>
    <script>
        document.getElementById('printButton').onclick = function () {
            document.getElementById('printOptions').classList.toggle('hidden');
        };
        document.getElementById('confirmPrint').onclick = function () {
            const format = document.getElementById('format').value;
            if (format === 'pdf') {
                alert('Mencetak dalam format PDF...');
            } else if (format === 'excel') {
                alert('Mencetak dalam format Excel...');
            }
            document.getElementById('printOptions').classList.add('hidden');
        };
    </script>
@endsection
