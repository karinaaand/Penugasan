    @extends('layouts.main')

    @section('container')

    <div class="container mx-auto">
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <form action="{{ route('master.drug.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="flex flex-wrap col-span-4">
                    <div class="flex w-full mb-4">
                        <label for="nama_obat" class="w-1/4 text-gray-700">Nama Obat</label>
                        <input type="text" id="name" name="name" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan nama obat">
                    </div>
                    <div class="flex w-full mb-4">
                        <label for="category_id" name="category_id" class="w-1/4 text-gray-700">Kategori Obat</label>
                        <select id="category_id" name="category_id" class="border border-gray-300 rounded p-2 w-3/4">
                            <option value="">Pilih Kategori Obat</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex w-full mb-4">
                        <label for="variant_id" class="w-1/4 text-gray-700">Jenis Obat</label>
                        <select id="variant_id" name="variant_id" class="border border-gray-300 rounded p-2 w-3/4">
                            <option value="">Pilih Jenis Obat</option>
                            @foreach ($variants as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex w-full mb-4">
                        <label for="manufacture_id" class="w-1/4 text-gray-700">Produsen Obat</label>
                        <select id="manufacture_id" name="manufacture_id" class="border border-gray-300 rounded p-2 w-3/4">
                            <option value="">Pilih Produsen Obat</option>
                            @foreach ($manufactures as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex w-full mb-4">
                        <label for="maximum_capacity" class="w-1/4 text-gray-700">PKMa</label>
                        <input type="number" id="maximum_capacity" name="maximum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan maksimum PKMa">
                    </div>
                    <div class="flex w-full mb-4">
                        <label for="minimum_capacity" class="w-1/4 text-gray-700">PKMi</label>
                        <input type="number" id="minimum_capacity" name="minimum_capacity" class="border border-gray-300 rounded p-2 w-3/4" placeholder="Inputkan minimum PKMi">
                    </div>
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td rowspan="3" class="w-44">Konversi</td>
                                <td class="py-2 pe-24">
                                    <div class="flex">
                                        <input type="number" id="pack_quantity" name="pack_quantity" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="0">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                            pack/box
                                        </span>
                                    </div>
                                </td>
                                <td class="py-2 pe-24">
                                    <div class="flex">
                                        <input type="number" id="pack_margin" name="pack_margin" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Margin">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                            %
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 pe-24">
                                    <div class="flex">
                                        <input type="number" id="piece_quantity" name="piece_quantity" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="0">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                            pcs/pack
                                        </span>
                                    </div>
                                </td>
                                <td class="py-2 pe-24">
                                    <div class="flex">
                                        <input type="number" id="piece_margin" name="piece_margin" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Margin">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                                            %
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 pe-24">
                                    <span class="text-xs italic text-gray-400">Netto</span>
                                    <div class="flex">
                                        <input type="number" id="piece_netto" name="piece_netto" class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Margin">
                                        <select id="piece_unit" name="piece_unit" class="border border-gray-300 rounded-e-lg p-2 w-2/5">
                                            <option value="ml">ml</option>
                                            <option value="gr">gr</option>
                                            <option value="butir">butir</option>
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
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                              Rp
                            </span>
                            <input type="number" id="last_price" name="last_price" class="bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Inputkan harga">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                              / pcs
                            </span>
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
            <div class="mt-6 text-center">
                <button type="submit" onclick="showSubmitModal('{{ $item->id }}')" class="bg-purple-500 text-white rounded hover:bg-purple-600 px-6 py-2">Simpan</button>
            </div>
        </form>
    </div>
    <div id="submitModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Anda yakin untuk menambahkan data ini?</p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeSubmitModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Batal</button>
                <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </div>
    <div id="toast-success" class="fixed hidden right-5 top-5 mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow light:bg-gray-800 light:text-gray-400" role="alert">
        <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 light:bg-green-800 light:text-green-200">
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" onclick=""
        class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 light:bg-gray-800 light:text-gray-500 light:hover:bg-gray-700 light:hover:text-white"
        aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
</button>
</div>
</div>
<script>
    const toast = document.getElementById('toast-success');
    toast.classList.remove('hidden');
    setTimeout(() => {
        document.getElementById('toast-success').classList.add('hidden');
    }, 2000);
</script>
    @session('success')
@endsession
@endsection

<script>
    function showSubmitModal() {
        document.getElementById('submitModal').classList.remove('hidden');
        document.querySelector('submitform').setAttribute('action', `{{ route('master.drug.store') }}/${id}`);
    }
    function closeSubmitModal() {   
        document.getElementById('submitModal').classList.add('hidden');
    }
</script>

