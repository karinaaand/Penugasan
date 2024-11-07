@extends('layouts.main')
@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <div class="mb-4 flex items-center">
            <div class="flex-1">
                <h2 class="text-2xl font-bold font-inter">NAMA KLINIK</h2>
                <p class="text-gray-600 font-inter text-lg">Tanggal : 19 September 2024</p>
            </div>
            <div class="flex flex-1 items-center justify-center">
                <label for="lpb" class="mr-2 text-lg font-normal font-inter text-black">No. LPB :</label>
                <input
                    type="text"
                    id="lpb"
                    class="mr-2 border-b border-gray-300 focus:border-gray-500 focus:outline-none"
                />
            </div>
            <div class="flex flex-1 justify-end">
                <button id="printButton" class="rounded-lg font-inter text-lg  bg-yellow-300 px-4 py-2 font-bold text-black">CETAK</button>
            </div>
        </div>
        <div id="printOptions" class="mb-4 hidden">
            <label for="format" class="text-lg font-semibold font-inter">Pilih format cetak:</label>
            <select id="format" class="ml-2 rounded-md border font-inter">
                <option class="font-inter text-base" value="pdf">PDF</option>
                <option class="font-inter text-base" value="excel">Excel</option>
            </select>
            <button id="confirmPrint" class="ml-2 rounded-lg font-inter text-lg bg-green-500 px-4 py-2 font-bold text-white">
                Download
            </button>
        </div>

        <h1 class="text-center font-inter text-3xl font-bold">LAPORAN PENERIMAAN BARANG</h1>
        <p class="mb-2 font-inter text-lg font-semibold">Diterima</p>
        <!-- Table -->
        <div class="overflow-hidden rounded-lg bg-white shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-sm uppercase leading-normal text-black">
                        <th class="border p-2 text-base font-inter">No</th>
                        <th class="border p-2 text-base font-inter">Kode Obat</th>
                        <th class="border p-2 text-base font-inter">Nama Obat</th>
                        <th class="border p-2 text-base font-inter">Jumlah</th>
                        <th class="border p-2 text-base font-inter">Harga Satuan</th>
                        <th class="border p-2 text-base font-inter">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-light text-gray-700">
                    <!-- Data Row 1 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center text-base font-inter">1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">#AAA111</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Obat 1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">10</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 10.000</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 100.000</td>
                    </tr>
                    <!-- Data Row 2 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center text-base font-inter">2</td>
                        <td class="px-6 py-3 text-center text-base font-inter">#AAA111</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Obat 1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">10</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 10.000</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 100.000</td>
                    </tr>
                    <!-- Data Row 3 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center text-base font-inter">3</td>
                        <td class="px-6 py-3 text-center text-base font-inter">#AAA111</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Obat 1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">10</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 10.000</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 100.000</td>
                    </tr>
                    <!-- Data Row 4 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center text-base font-inter">4</td>
                        <td class="px-6 py-3 text-center text-base font-inter">#AAA111</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Obat 1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">10</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 10.000</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 100.000</td>
                    </tr>
                    <!-- Data Row 5 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center text-base font-inter">5</td>
                        <td class="px-6 py-3 text-center text-base font-inter">#AAA111</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Obat 1</td>
                        <td class="px-6 py-3 text-center text-base font-inter">10</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 10.000</td>
                        <td class="px-6 py-3 text-center text-base font-inter">Rp 100.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex items-center justify-end">
            <p class="mr-2 font-semibold text-lg font-inter">Grand total :</p>
            <input
                type="text"
                value="Rp 750.000"
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
