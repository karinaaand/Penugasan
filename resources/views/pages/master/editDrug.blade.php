@extends('layouts.main')

@section('container')
<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('master.drug.update',$drug->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="grid grid-cols-6 gap-6">
        <div class="flex flex-wrap col-span-4">
            <div class="flex w-full mb-4">
                <label for="nama_obat" class="w-1/4 text-gray-700">Nama Obat</label>
                <h1>{{ $drug->name }}</h1>
            </div>
            <div class="flex w-full mb-4">
                <label for="nama_obat" class="w-1/4 text-gray-700">Kode Obat</label>
                <h1>{{ $drug->code }}</h1>
            </div>
            <div class="flex w-full mb-4">
                <label for="category_id" name="category_id" class="w-1/4 text-gray-700">Kategori Obat:</label>
                <h1>{{ $drug->category()->name }}</h1>
            </div>
            <div class="flex w-full mb-4">
                <label for="variant_id" class="w-1/4 text-gray-700">Jenis Obat:</label>
                <h1>{{ $drug->variant()->name }}</h1>
            </div>
            <div class="flex w-full mb-4">
                <label for="manufacture_id" class="w-1/4 text-gray-700">Produsen Obat:</label>
                <h1>{{ $drug->manufacture()->name }}</h1>
            </div>
            <div class="flex w-full mb-4">
                <label for="maximum_capacity" class="w-1/4 text-gray-700">PKMa:</label>
                <input value="{{ $drug->maximum_capacity }}" type="number" id="maximum_capacity" name="maximum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan maksimum PKMa">
            </div>
            <div class="flex w-full mb-4">
                <label for="minimum_capacity" class="w-1/4 text-gray-700">PKMi:</label>
                <input value="{{ $drug->minimum_capacity }}" type="number" id="minimum_capacity" name="minimum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan minimum PKMi">
            </div>
        </div>

            <div class="bg-white border rounded-lg p-6 shadow-sm w-full h-max col-span-2">
                <div class="flex justify-between items-center">
                    <label for="last_price" class="text-gray-700 mr-2">Harga</label>
                    <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                        Rp
                    </span>
                    <input value="{{ $drug->last_price }}" type="number" id="last_price" name="last_price" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan harga">
                </div>
            </div>
            <div class="flex justify-between items-center mt-6">
                <label for="last_discount" class="text-gray-700 mr-2">Diskon</label>
                <div class="flex">
                    <input value="{{ $drug->last_discount }}" type="number" id="last_discount" name="last_discount" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan discount">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                        %
                    </span>
                </div>
            </div>
            <button type="submit" class="bg-indigo w-full rounded-md p-2 mt-6 text-white hover:bg-indi">Simpan</button>
        </div>

    </div>
    <div class="grid grid-cols-4 gap-4 mt-6 items-center">
        <div class="text-gray-700 font-semibold text-right pe-48 col-span-3">Margin</div>
        <div class="col-span-1"></div>
        <div class="text-gray-700 col-span-1">Konversi Obat:</div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->box_quantity }}" type="number" name="box_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">Box</span>
        </div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->box_margin }}" type="number" name="box_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">%</span>
        </div>
        <div class="col-span-1"></div>
        <div></div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->pack_quantity }}" type="number" name="pack_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">Pack/Box</span>
        </div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->pack_margin }}" type="number" name="pack_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">%</span>
        </div>
        <div class="col-span-1"></div>
        <div></div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->piece_quantity }}" type="number" name="piece_quantity" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">Pcs/Box</span>
        </div>
        <div class="col-span-1 flex items-center">
            <input value="{{ $drug->piece_margin }}" type="number" name="piece_margin" class="border border-gray-300 rounded p-2 w-24 mr-2" placeholder="0">
            <span class="text-gray-700">%</span>
        </div>
        <div class="col-span-1"></div>
    </div>
        <div class="mt-6 text-center">
            <button type="submit" class="bg-purple-500 text-white rounded hover:bg-purple-600 px-6 py-2">Simpan</button>
        </div>
    </div>
    </form>
    <h2 class="text-2xl font-bold text-gray-700 mt-8">Repackaging</h2>

    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <div class="flex items-center mb-4">
            <input type="number" name="quantity" class="border border-gray-300 rounded p-2 w-1/4" placeholder="Inputkan jumlah">
            <select name="unit" class="border border-gray-300 rounded p-2 w-1/4 mx-4">
                <option value="">Satuan</option>
                <option value="ml">ml</option>
                <option value="pcs">pcs</option>
                <option value="pack">pack</option>
                <option value="box">box</option>
                <option value="gr">gr</option>
            </select>
            <div class="flex">
                <input type="number" id="margin" name="margin" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan margin">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                    %
                </span>
            </div>
            <button class="bg-green-500 text-white rounded hover:bg-green-600 px-4 py-2 ml-4">+ Add</button>
        </div>
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
                    @foreach ($repacks as $number=>$item)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
