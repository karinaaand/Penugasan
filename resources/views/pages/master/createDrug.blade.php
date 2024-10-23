    @extends('layouts.main')

    @section('container')

    <div class="container mx-auto mt-8">
        <!-- Form Header -->
        <h1 class="text-3xl font-bold text-gray-700 mb-6">Input Obat</h1>

        <!-- Form Input -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama_obat" class="block text-gray-700">Nama Obat:</label>
                            <input type="text" id="nama_obat" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan nama obat">
                        </div>
                        <div>
                            <label for="kode_obat" class="block text-gray-700">Kode Obat:</label>
                            <input type="text" id="kode_obat" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan kode obat">
                        </div>
                        <div>
                            <label for="kategori_obat" class="block text-gray-700">Kategori Obat:</label>
                            <select id="kategori_obat" class="border border-gray-300 rounded p-2 w-full">
                                <option value="">Pilih Kategori</option>
                            </select>
                        </div>
                        <div>
                            <label for="jenis_obat" class="block text-gray-700">Jenis Obat:</label>
                            <input type="text" id="jenis_obat" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan jenis obat">
                        </div>
                        <div>
                            <label for="produsen_obat" class="block text-gray-700">Produsen Obat:</label>
                            <select id="produsen_obat" class="border border-gray-300 rounded p-2 w-full">
                                <option value="">Pilih Produsen</option>
                            </select>
                        </div>
                        <div>
                            <label for="kuantitas_max" class="block text-gray-700">Penentuan Kuantitas Maksimum (PKMa):</label>
                            <input type="text" id="kuantitas_max" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan maksimum PKMa">
                        </div>
                        <div>
                            <label for="kuantitas_min" class="block text-gray-700">Penentuan Kuantitas Minimum (PKMa):</label>
                            <input type="text" id="kuantitas_min" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan minimum PKMa">
                        </div>
                    </div>
                </div>

                <!-- Harga dan Diskon Card -->
                <div class="bg-white border rounded-lg p-4 shadow-sm">
                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700">Harga:</label>
                        <input type="text" id="harga" class="border border-gray-300 rounded p-2 w-full" placeholder="Inputkan harga">
                    </div>
                    <div>
                        <label for="diskon" class="block text-gray-700">Diskon:</label>
                        <div class="flex items-center">
                            <input type="text" id="diskon" class="border border-gray-300 rounded p-2 w-full mr-2" placeholder="Inputkan diskon">
                            <span class="text-gray-500">%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konversi Obat Section -->
            <div class="grid grid-cols-3 gap-6 mt-6">
                <div>
                    <label for="box_margin" class="block text-gray-700">Konversi Obat / Box:</label>
                    <input type="text" id="box_margin" class="border border-gray-300 rounded p-2 w-full" placeholder="%">
                </div>
                <div>
                    <label for="pack_margin" class="block text-gray-700">Konversi Obat / Pack:</label>
                    <input type="text" id="pack_margin" class="border border-gray-300 rounded p-2 w-full" placeholder="%">
                </div>
                <div>
                    <label for="pcs_margin" class="block text-gray-700">Konversi Obat / Pcs:</label>
                    <input type="text" id="pcs_margin" class="border border-gray-300 rounded p-2 w-full" placeholder="%">
                </div>
            </div>

            <!-- Save Button -->
            <div class="mt-6">
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
