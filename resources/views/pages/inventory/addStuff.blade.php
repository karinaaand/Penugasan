@extends('layouts.main')
@section('container')
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <div class="justify-right mb-4 flex items-center">
            <button class="mr-4 rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Upload</button>
            <button class="rounded-lg bg-green-500 px-4 py-2 text-white hover:bg-green-600">Template</button>
        </div>
        <div class="space-y-4">
            <form action="{{ route('inventory.inflows.store') }}" method="post" class="space-y-4">
                @csrf
                <input type="hidden" name="transaction">
                <input type="hidden" name="total">
                <div class="grid grid-cols-2  gap-4">
                    <select name="vendor_id" class="w-full rounded border border-gray-300 p-3">
                        <option selected disabled>Inputkan vendor</option>
                        @foreach ($vendors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex">
                        <select name="method" class="w-full rounded-s border border-gray-300 p-2">
                            <option selected disabled>Bayar Langsung / Bayar Tempo</option>
                            <option value="cash">Bayar Langsung</option>
                            <option value="credit">Bayar Tempo</option>
                        </select>
                        <input name="due" type="date" class="w-full rounded-e border border-gray-300 p-2"
                            placeholder="Masukkan tanggal tempo" />
                    </div>
                </div>
            </form>
            <div class="grid grid-cols-2 gap-4">
                <input type="text" id="drugInput" name="drug" class="w-full rounded border border-gray-300 p-2"
                    placeholder="Inputkan nama obat" autocomplete="off">
                <ul id="suggestions" class="absolute mt-10 border border-gray-300 bg-white rounded hidden"></ul>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex">
                        <input name="quantity" type="number" class="w-full rounded-s border border-gray-300 p-2"
                            placeholder="Jumlah" />
                        <select name="unit" class="w-full rounded-e border border-gray-300 p-2">
                            <option class="pcs">pcs</option>
                            <option class="pack">pack</option>
                            <option class="box">box</option>
                        </select>
                    </div>
                    <input name="price" type="number" class="w-full rounded border border-gray-300 p-2"
                        placeholder="Harga Satuan" />
                    <div class="flex">
                        <a class="w-full rounded-s border border-gray-300 p-2 bg-gray-200">EXP</a>
                        <input name="expired" type="date" class="w-full rounded-e border border-gray-300 p-2"
                            placeholder="Inputkan expired obat" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button onclick="addStuff()" class="rounded-lg bg-purple-500 px-20 py-2 text-white hover:bg-purple-600">
                    Tambah
                </button>
            </div>
        </div>
    </div>
    <div class="rounded-lg bg-white p-6 shadow-lg mt-4">
        <div class="mt-8">
            <div class="flex justify-between mb-4">
                <h1>Total: <span id="total" class="font-bold">Rp 0</span></h1>
                <button onclick="submitModal()" class="rounded-lg bg-green-500 px-12 py-2 text-white hover:bg-green-600 ">
                    SAVE
                </button>
            </div>
            <div class="overflow-hidden rounded-lg bg-white shadow-md">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-200 text-sm uppercase leading-normal text-black">
                            <th class="border p-2">Nama Obat</th>
                            <th class="border p-2">Jumlah</th>
                            <th class="border p-2">Harga Satuan</th>
                            <th class="border p-2">Subtotal</th>
                            <th class="border p-2">Expired</th>
                            <th class="border p-2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-700" id="drugTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Anda yakin untuk menghapus data ini?
            </p>
            <div class="flex justify-center space-x-4">
                    <button type="reset" onclick="return closeDeleteModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                    <button onclick="deleteItem()" class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
            </div>
        </div>
    </div>
    <div id="saveModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Apakah Anda yakin ingin menyimpan transaksi ini?</p>
            <div class="flex justify-center space-x-4">
                    <button type="reset" onclick="return closeSaveModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                    <button type="button" onclick="submitForm()"
                        class="px-4 py-2 bg-green-500 text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </div>
@endsection

<script>
    let deleteForItem = null;
    document.addEventListener('DOMContentLoaded', function() {
        const drugInput = document.querySelector("input[name='drug']")
        const unitInput = document.querySelector("select[name='unit']")
        const quantityInput = document.querySelector("input[name='quantity']")
        unitInput.addEventListener('change', function(e) {
            const name = drugInput.value
            fetch(`/get-drug-price/${name}/${unitInput.value}`)
                .then(response => response.json())
                .then(data => {
                    // Mengisi field price dengan harga yang diterima dari server
                    document.querySelector("input[name='price']").value = data.price * (
                        quantityInput.value == 0 ? 1 : quantityInput.value);
                })
                .catch(error => console.error('Error:', error));
        })
        quantityInput.addEventListener('input', function(e) {
            const name = drugInput.value
            fetch(`/get-drug-price/${name}/${unitInput.value}`)
                .then(response => response.json())
                .then(data => {
                    // Mengisi field price dengan harga yang diterima dari server
                    document.querySelector("input[name='price']").value = data.price * quantityInput
                        .value;
                })
                .catch(error => console.error('Error:', error));
        })
        let timeout = null;

        drugInput.addEventListener('input', function() {
            clearTimeout(timeout);
            const query = this.value;

            // Tunda 500 ms sebelum kirim permintaan
            timeout = setTimeout(() => {
                if (query.length > 0) {
                    fetch(`/drug-suggestions?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            const suggestions = document.getElementById('suggestions');
                            suggestions.innerHTML = '';

                            if (data.length > 0) {
                                suggestions.classList.remove('hidden');
                                data.forEach(item => {
                                    const option = document.createElement('li');
                                    option.textContent = `${item.name}`;
                                    option.classList.add('p-2', 'cursor-pointer',
                                        'hover:bg-gray-100');
                                    option.addEventListener('click', () => {
                                        document.getElementById('drugInput')
                                            .value = item.name;
                                        suggestions.classList.add('hidden');
                                        const name = drugInput.value
                                        fetch(`/get-drug-price/${name}/pcs`)
                                            .then(response => response
                                                .json())
                                            .then(data => {
                                                // Mengisi field price dengan harga yang diterima dari server
                                                document.querySelector(
                                                        "input[name='price']"
                                                    ).value = data
                                                    .price * (
                                                        quantityInput
                                                        .value == 0 ?
                                                        1 :
                                                        quantityInput
                                                        .value);
                                            })
                                            .catch(error => console.error(
                                                'Error:', error));
                                    });
                                    suggestions.appendChild(option);
                                });
                            } else {
                                suggestions.classList.add('hidden');
                            }
                        });
                } else {
                    document.getElementById('suggestions').classList.add('hidden');
                }
            }, 400);
        });

    });

    let data = []
    let total = 0;

    function addStuff() {
        let drug = document.querySelector("input[name='drug']")
        let quantity = document.querySelector("input[name='quantity']")
        let unit = document.querySelector("select[name='unit']")
        let price = document.querySelector("input[name='price']")
        let expired = document.querySelector("input[name='expired']")
        let input = [drug, quantity, unit, price, expired]
        let datainput = input.map(e => e.value)
        const status = true
        datainput.forEach(e => {
            if (e == "") {
                status = false
            }
        });
        if (status) {
            data.push(datainput)
            draw()
            input.forEach(e => {
                e.value = null
            });
        }
    }

    function draw() {
        total = 0;
        document.querySelector("#drugTable").innerHTML = ""
        data.forEach((e, i) => {
            document.querySelector("#drugTable").innerHTML += row(e, i)
        });
        document.querySelector("#total").innerHTML = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(total)
    }

    function row(datainput, i) {
        [drug, quantity, unit, price, expired] = datainput
        total += parseInt(price)
        return `<tr class="border-b border-gray-200 hover:bg-gray-100 text-center">
                            <td>${drug}</td>
                            <td>${quantity} ${unit}</td>
                            <td>${price/quantity}</td>
                            <td>${price}</td>
                            <td>${expired}</td>
                            <td class="py-2">
                                <button type="button" onclick="showDeleteModal(${i})"
                                    class="bg-red-500 text-white text-sm px-2 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                    <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.167 5.50002H18.3337V7.16669H16.667V18C16.667 18.221 16.5792 18.433 16.4229 18.5893C16.2666 18.7456 16.0547 18.8334 15.8337 18.8334H4.16699C3.94598 18.8334 3.73402 18.7456 3.57774 18.5893C3.42146 18.433 3.33366 18.221 3.33366 18V7.16669H1.66699V5.50002H5.83366V3.00002C5.83366 2.77901 5.92146 2.56704 6.07774 2.41076C6.23402 2.25448 6.44598 2.16669 6.66699 2.16669H13.3337C13.5547 2.16669 13.7666 2.25448 13.9229 2.41076C14.0792 2.56704 14.167 2.77901 14.167 3.00002V5.50002ZM15.0003 7.16669H5.00033V17.1667H15.0003V7.16669ZM7.50033 3.83335V5.50002H12.5003V3.83335H7.50033Z" fill="white"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>`
    }

    function showDeleteModal(index) {
        deleteForItem = index;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function submitModal() {
        document.getElementById('saveModal').classList.remove('hidden');
    }
    function closeSaveModal() {
        document.getElementById('saveModal').classList.add('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function deleteItem() {
        closeDeleteModal()
        data.splice(deleteForItem, 1)
        draw()
    }

    function submitForm() {
            data = data.map(function(e) {
                return {
                    name: e[0],
                    quantity: parseInt(e[1]), // Convert quantity to integer
                    unit: e[2],
                    piece_price: parseFloat(e[3]) / e[1], // Convert price to float and calculate piece price
                    price: parseFloat(e[3]), // Convert total price to float
                    expired: e[4]
                };
            });
            document.querySelector("input[name='total']").value = total
            document.querySelector("input[name='transaction']").value = JSON.stringify(data)
            // document.querySelector("input[name='transaction']").value = JSON.stringify(data).replaceAll('{','[').replaceAll('}',']').replaceAll(':','=>')
            document.querySelector("form").submit()
    }
</script>
