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
            <div class="grid grid-cols-3 gap-4">
                <div></div>
                <select name="vendor_id" class="w-full rounded border border-gray-300 p-3">
                    <option selected disabled>Inputkan vendor</option>
                    @foreach ($vendors as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <select name="method" class="w-full rounded border border-gray-300 p-2">
                    <option selected disabled>Bayar Langsung / Bayar Tempo</option>
                    <option value="cash">Bayar Langsung</option>
                    <option value="credit">Bayar Tempo</option>
                </select>
                <input name="due" type="date" class="w-full rounded border border-gray-300 p-2"
                    placeholder="Masukkan tanggal tempo" />
            </div>
        </form>
            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="drugInput" name="drug" class="w-full rounded border border-gray-300 p-2"
                    placeholder="Inputkan nama obat" autocomplete="off">
                <ul id="suggestions" class="absolute mt-10 border border-gray-300 bg-white rounded hidden"></ul>

                {{-- <input type="text" class="w-full rounded border border-gray-300 p-2" placeholder="Inputkan nama" />
                <select name="drug" class="w-full rounded border border-gray-300 p-2">
                    <option selected>Inputkan obat</option>
                    @foreach ($drugs as $item)
                        <option value="{{ $item->id }}_{{ $item->name }}_{{ $item->code }}">{{ $item->name }}
                        </option>
                    @endforeach
                </select> --}}
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-4">
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
                </div>
                <input name="expired" type="date" class="w-full rounded border border-gray-300 p-2"
                    placeholder="Inputkan expired obat" />
            </div>
            <div class="flex justify-center">
                <button onclick="addStuff()" class="rounded-lg bg-purple-500 px-20 py-2 text-white hover:bg-purple-600">
                    Tambah
                </button>
            </div>
        </div>

        <div class="mt-8">
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
            <div class="mt-4 flex justify-between">
                <h1>Total: <span id="total" class="font-bold">Rp 0</span></h1>
                <button onclick="submitForm()" class="rounded-lg bg-green-500 px-12 py-2 text-white hover:bg-green-600">
                    SAVE
                </button>
            </div>
        </div>
    </div>
@endsection

<script>
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
                                <button onclick="deleteItem(${i})" class="rounded-md bg-red-500 p-1">
                                    <img src="{{ asset('assets/Vector sampah.png') }}" class="inline-block h-4 w-4" />
                                </button>
                            </td>
                        </tr>`
    }

    function deleteItem(index) {
        data.splice(index, 1)
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
