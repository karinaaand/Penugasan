    @extends('layouts.main')

    @section('container')

    <div class="container mx-auto mt-8">
        <!-- Form Header -->
        <h1 class="text-3xl font-bold text-gray-700 mb-6">Input Obat</h1>

        <!-- Form Input -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="flex flex-wrap col-span-4">
                <!-- Form Input Items -->
                <div class="flex w-full mb-4">
                    <label for="nama_obat" class="w-1/4 text-gray-700">Nama Obat:</label>
                    <input type="text" id="nama_obat" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan nama obat">
                </div>
                <div class="flex w-full mb-4">
                    <label for="kode_obat" class="w-1/4 text-gray-700">Kode Obat:</label>
                    <input type="text" id="kode_obat" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan kode obat">
                </div>
                <div class="flex w-full mb-4">
                    <label for="kategori_obat" class="w-1/4 text-gray-700">Kategori Obat:</label>
                    <select id="kategori_obat" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Kategori Obat</option>
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="jenis_obat" class="w-1/4 text-gray-700">Jenis Obat:</label>
                    <select id="kategori_obat" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Jenis Obat</option>
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="produsen_obat" class="w-1/4 text-gray-700">Produsen Obat:</label>
                    <select id="produsen_obat" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Produsen Obat</option>
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="kuantitas_max" class="w-1/4 text-gray-700">PKMa:</label>
                    <input type="text" id="kuantitas_max" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan maksimum PKMa">
                </div>
                <div class="flex w-full mb-4">
                    <label for="kuantitas_min" class="w-1/4 text-gray-700">PKMi:</label>
                    <input type="text" id="kuantitas_min" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan minimum PKMi">
                </div>
            </div>

            <!-- Harga and Diskon Section on the Right -->
            <div class="bg-white border rounded-lg p-6 shadow-sm w-full h-max col-span-2">
                <!-- Line 1: Harga -->
                <div class="flex items-center mb-4">
                    <label for="harga" class="w-1/4 text-gray-700">Harga:</label>
                    <input type="text" id="harga" class="border border-gray-300 rounded p-2 w-1/2 mr-2" placeholder="Inputkan harga">
                    <button class="bg-blue-500 text-white rounded hover:bg-blue-600 px-4 py-2">Simpan</button>
                </div>
                <!-- Line 2: Diskon -->
                <div class="flex items-center">
                    <label for="diskon" class="w-1/4 text-gray-700 mr-2">Diskon:</label>
                    <input type="text" id="diskon" class="border border-gray-300 rounded p-2 w-1/2 mr-2" placeholder="Inputkan diskon">
                    <span class="text-gray-500 mr-2">%</span>
                    <button class="bg-blue-500 text-white rounded hover:bg-blue-600 px-4 py-2">Simpan</button>
                </div>
            </div>

        </div>
        <!-- Konversi Obat Section -->
        <div class="grid grid-cols-4 gap-4 mt-6 items-center">
            <div class="text-gray-700 font-semibold text-right pe-48 col-span-3">Margin</div> <!-- Label Margin -->
            <div class="col-span-1"></div>
            <!-- Baris Pertama -->

            <!-- Baris Kedua -->
            <div class="text-gray-700 col-span-1">Konversi Obat:</div>
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">/ Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div> <!-- Kosong -->

            <!-- Baris Ketiga -->
            <div></div> <!-- Kosong -->
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">Pack/Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div> <!-- Kosong -->

            <!-- Baris Keempat -->
            <div></div> <!-- Kosong -->
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">Pcs/Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="text" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div> <!-- Kosong -->
        </div>
            <!-- Save Button -->
            <div class="mt-6 text-center">
                <button class="bg-purple-500 text-white rounded hover:bg-purple-600 px-6 py-2">Simpan</button>
            </div>
        </div>

        <!-- Repackaging Section -->
        <h2 class="text-2xl font-bold text-gray-700 mt-8">Repackaging</h2>

        <div class="bg-white shadow-md rounded-lg p-6 mt-4">
            <div class="flex items-center mb-4">
                <input type="number" class="border border-gray-300 rounded p-2 w-1/4" placeholder="Inputkan jumlah">
                <select class="border border-gray-300 rounded p-2 w-1/4 mx-4">
                    <option value="ml">ml</option>
                    <option value="ltr">ltr</option>
                </select>
                <input type="number" class="border border-gray-300 rounded p-2 w-1/4" placeholder="Inputkan margin">
                <button class="bg-green-500 text-white rounded hover:bg-green-600 px-4 py-2 ml-4">+ Add</button>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">NO</th>
                            <th class="py-3 px-6 text-left">JUMLAH</th>
                            <th class="py-3 px-6 text-left">MARGIN</th>
                            <th class="py-3 px-6 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @for ($i = 1; $i <= 10; $i++)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $i }}</td>
                            <td class="py-3 px-6 text-left">Jumlah {{ $i }}</td>
                            <td class="py-3 px-6 text-left">Margin {{ $i }}%</td>
                            <td class="py-3 px-6 text-center">
                                <button class="bg-yellow-300 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-400 transition-colors duration-200 mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
