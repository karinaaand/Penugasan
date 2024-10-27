    @extends('layouts.main')

    @section('container')

    <div class="container mx-auto">
    <div class="bg-white shadow-md rounded-lg py-12 px-6">
        <form action="{{ route('master.drug.store') }}" method="POST">
            @csrf
        <div class="grid grid-cols-6 gap-6">
            <div class="flex flex-wrap col-span-4">
                <div class="flex w-full mb-4">
                    <label for="nama_obat" class="w-1/4 text-gray-700">Nama Obat:</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan nama obat">
                </div>
                <div class="flex w-full mb-4">
                    <label for="category_id" name="category_id" class="w-1/4 text-gray-700">Kategori Obat:</label>
                    <select id="category_id" name="category_id" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Kategori Obat</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="variant_id" class="w-1/4 text-gray-700">Jenis Obat:</label>
                    <select id="variant_id" name="variant_id" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Jenis Obat</option>
                        @foreach ($variants as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="manufacture_id" class="w-1/4 text-gray-700">Produsen Obat:</label>
                    <select id="manufacture_id" name="manufacture_id" class="border border-gray-300 rounded p-2 w-3/4">
                        <option value="">Pilih Produsen Obat</option>
                        @foreach ($manufactures as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full mb-4">
                    <label for="maximum_capacity" class="w-1/4 text-gray-700">PKMa:</label>
                    <input type="number" id="maximum_capacity" name="maximum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan maksimum PKMa">
                </div>
                <div class="flex w-full mb-4">
                    <label for="minimum_capacity" class="w-1/4 text-gray-700">PKMi:</label>
                    <input type="number" id="minimum_capacity" name="minimum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan minimum PKMi">
                </div>
            </div>
            <div class="bg-white border rounded-lg p-6 shadow-sm w-full h-max col-span-2">
                <div class="flex justify-between items-center">
                    <label for="last_price" class="text-gray-700 mr-2">Harga</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                          Rp
                        </span>
                        <input type="number" id="last_price" name="last_price" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan harga">
                    </div>
                </div>
                <div class="flex justify-between items-center mt-6">
                    <label for="last_discount" class="text-gray-700 mr-2">Diskon</label>
                    <div class="flex">
                        <input type="number" id="last_discount" name="last_discount" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan discount">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                          %
                        </span>
                    </div>
                </div>
            </div>

        </div>
        <div class="grid grid-cols-4 gap-4 mt-6 items-center">
            <div class="text-gray-700 font-semibold text-right pe-48 col-span-3">Margin</div>
            <div class="col-span-1"></div>
            <div class="text-gray-700 col-span-1">Konversi Obat:</div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="box_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="box_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div>
            <div></div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="pack_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">Pack/Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="pack_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div>
            <div></div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="piece_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">Pcs/Box</span>
            </div>
            <div class="col-span-1 flex items-center">
                <input type="number" name="piece_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
                <span class="text-gray-700">%</span>
            </div>
            <div class="col-span-1"></div>
        </div>
            <div class="mt-6 text-center">
                <button type="submit" class="bg-purple-500 text-white rounded hover:bg-purple-600 px-6 py-2">Simpan</button>
            </div>
        </div>
        </form>
    </div>

    @endsection
