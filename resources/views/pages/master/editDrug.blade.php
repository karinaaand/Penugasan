@extends('layouts.main')

@section('container')
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg py-12 px-6">
            <form action="{{ route('master.drug.update',$drug->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-6 gap-6">
                    <div class="flex flex-wrap col-span-4">
                        <div class="flex w-full mb-4">
                            <label for="nama_obat" class="w-1/4 text-gray-700">Nama Obat</label>
                            <h1 class="w-3/4">{{ $drug->name }}</h1>
                        </div>
                        <div class="flex w-full mb-4">
                            <label for="category_id" name="category_id" class="w-1/4 text-gray-700">Kategori Obat</label>
                            <h1 class="w-3/4">{{ $drug->category()->name }}</h1>
                        </div>
                        <div class="flex w-full mb-4">
                            <label for="variant_id" class="w-1/4 text-gray-700">Jenis Obat</label>
                            <h1 class="w-3/4">{{ $drug->variant()->name }}</h1>
                        </div>
                        <div class="flex w-full mb-4">
                            <label for="manufacture_id" class="w-1/4 text-gray-700">Produsen Obat</label>
                            <h1 class="w-3/4">{{ $drug->manufacture()->name }}</h1>
                        </div>
                        <div class="flex w-full mb-4">
                            <label for="maximum_capacity" class="w-1/4 text-gray-700">PKMa</label>
                            <input type="number" value="{{ $drug->maximum_capacity }}" id="maximum_capacity"
                                name="maximum_capacity" class="border border-gray-300 rounded p-2 w-3/4"
                                placeholder="Inputkan maksimum PKMa">
                        </div>
                        <div class="flex w-full mb-4">
                            <label for="minimum_capacity" class="w-1/4 text-gray-700">PKMi</label>
                            <input type="number" value="{{ $drug->minimum_capacity }}" id="minimum_capacity"
                                name="minimum_capacity" class="border border-gray-300 rounded p-2 w-3/4"
                                placeholder="Inputkan minimum PKMi">
                        </div>
                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <td rowspan="3" class="w-44">Konversi</td>
                                    <td class="py-2 pe-24">
                                        <div class="flex">
                                            <input value="{{ $drug->pack_quantity }}" type="number" id="pack_quantity"
                                                name="pack_quantity"
                                                class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                                placeholder="0">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                                pack/box
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-2 pe-24">
                                        <div class="flex">
                                            <input value="{{ $drug->pack_margin }}" type="number" id="pack_margin"
                                                name="pack_margin"
                                                class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                                placeholder="Margin">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                                %
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 pe-24">
                                        <div class="flex">
                                            <input value="{{ $drug->piece_quantity }}" type="number" id="piece_quantity"
                                                name="piece_quantity"
                                                class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                                placeholder="0">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                                pcs/pack
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-2 pe-24">
                                        <div class="flex">
                                            <input value="{{ $drug->piece_margin }}" type="number" id="piece_margin"
                                                name="piece_margin"
                                                class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                                placeholder="Margin">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                                %
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 pe-24">
                                        <span class="text-xs italic text-gray-400">Netto</span>
                                        <div class="flex">
                                            <input disabled value="{{ $drug->piece_netto }}" type="number"
                                                id="piece_netto" name="piece_netto"
                                                class="rounded-none rounded-s-lg text-gray-900 bg-gray-200 border border-gray-300 block flex-1 min-w-0 w-full text-sm p-2.5"
                                                placeholder="Margin">
                                            <select disabled id="piece_unit" name="piece_unit"
                                                class="border border-gray-300 rounded-e-lg p-2 w-2/5 text-gray-900 bg-gray-200">
                                                <option {{ $drug->piece_unit == 'ml' ? 'selected' : '' }} value="ml">ml
                                                </option>
                                                <option {{ $drug->piece_unit == 'gr' ? 'selected' : '' }} value="gr">gr
                                                </option>
                                                <option {{ $drug->piece_unit == 'butir' ? 'selected' : '' }} value="butir">butir
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white border rounded-lg p-6 shadow-sm w-full h-max col-span-2">
                        <div class="flex justify-between items-center">
                            <label for="last_price" class="text-gray-700 mr-2">Harga</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                                    Rp
                                </span>
                                <input value="{{ $drug->last_price }}" type="number" id="last_price" name="last_price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    placeholder="Inputkan harga">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                    / pcs
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-6">
                            <label for="last_discount" class="text-gray-700 mr-2">Diskon</label>
                            <div class="flex">
                                <input value="{{ $drug->last_discount }}" type="number" id="last_discount"
                                    name="last_discount"
                                    class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                                    placeholder="Inputkan discount">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                    %
                                </span>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-indigo-500 w-full mt-6 text-white rounded hover:bg-indigo-700 px-6 py-2">Simpan</button>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <button type="submit"
                        class="bg-purple-500 text-white rounded hover:bg-purple-600 px-6 py-2">Simpan</button>
                </div>
            </form>
        </div>
        <h2 class="text-2xl font-bold text-gray-700 mt-8">Repackaging</h2>

        <div class="bg-white shadow-md rounded-lg p-6 mt-4">
            <form action="{{ route('master.drug.repack.store',$drug->id) }}" method="POST">
                @csrf
                <div class="flex items-center mb-4 gap-3">
                    <input type="text" name="name" class="border border-gray-300 rounded p-2 w-3/4"
                        placeholder="Nama Repack">
                    <div class="flex">
                        <input type="number" id="quantity" name="quantity"
                            class="rounded-none rounded-s-lg text-gray-900 bg-gray-50 border border-gray-300 block flex-1 w-1/5 text-sm p-2.5"
                            placeholder="Jumlah">
                        <select id="piece_unit" name="piece_unit"
                            class="border border-gray-300 rounded-e-lg p-2 text-gray-900 bg-gray-50">
                            <option>Satuan</option>
                            @if ($unit=$drug->piece_unit != "butir")
                            <option value="{{ $unit }}">{{ $drug->piece_unit }}</option>
                            @else 
                            <option value="{{ $unit }}">{{ $drug->piece_unit }}</option>
                            @endif
                            <option value="pcs">pcs</option>
                        </select>
                    </div>
                    <div class="flex">
                        <input type="number" id="margin" name="margin"
                            class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block w-1/12 flex-1 text-sm p-2.5"
                            placeholder="Margin">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                            %
                        </span>
                    </div>
                    <button class="bg-green-500 text-white rounded hover:bg-green-600 px-4 py-2 ml-4 w-28">+ Add</button>
                </div>
            </form>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">NO</th>
                            <th class="py-3 px-6 text-left">NAMA</th>
                            <th class="py-3 px-6 text-left">HARGA</th>
                            <th class="py-3 px-6 text-left">MARGIN</th>
                            <th class="py-3 px-6 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($repacks as $number => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $number+1 }}</td>
                                <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                                <td class="py-3 px-6 text-left">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-6 text-left">{{ $item->margin }}%</td>
                                <td class="py-3 px-6 text-center">
                                    <form action="{{ route('master.drug.repack.destroy',[$drug->id,$item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
