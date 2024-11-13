@extends('layouts.main')
@section('container')
    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <input type="hidden" name="code">
            <input type="text" id="drugInput" name="drug" class="w-full rounded border border-gray-300 p-2"
                placeholder="Inputkan nama obat" autocomplete="off">
            <ul id="suggestions" class="absolute mt-10 border border-gray-300 bg-white rounded hidden"></ul>
            <div class="grid grid-cols-3 gap-4">
                <div class="flex">
                    <input type="number" max="1" id="quantity" name="quantity"
                    class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                    placeholder="0">
                    <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                    pcs
                </span>
            </div>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                    Sisa
                </span>
                <input disabled type="number" id="sisa" name="sisa"
                    class="rounded-none bg-gray-100 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5"
                    placeholder="0">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                    pcs
                </span>
            </div>
            <button onclick="addStuff()" class="rounded-lg bg-blue-500 py-2 text-white hover:bg-blue-700">
                    Tambah
                </button>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-end mt-8">
        <button onclick="submitForm()" class="rounded-lg bg-green-500 py-1 px-4 text-white hover:bg-green-600">
            Save
        </button>
    </div>
    <div class="bg-white p-8 rounded-lg border-2 border-gray-200 shadow-lg mt-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal text-sm">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="p-2 text-center">NO</th>
                        <th class="p-2 text-center">KODE OBAT</th>
                        <th class="p-2 text-center">NAMA OBAT</th>
                        <th class="p-2 text-center">JUMLAH</th>
                        <th class="p-2 text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody id="drugTable">                        
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <form action="{{ route('clinic.inflows.store') }}" method="POST">
        @csrf
        <input type="text" name="transaction">
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const drugInput = document.querySelector("input[name='drug']")
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
                                            document.querySelector("input[name='code']").value = item.code
                                            document.querySelector("input[name='sisa']").value = Math.floor(item.warehouse.quantity/item.piece_netto);
                                            document.querySelector("input[name='quantity']").setAttribute('max',Math.floor(item.warehouse.quantity/item.piece_netto))    
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
        function addStuff() {
        let code = document.querySelector("input[name='code']")
        let drug = document.querySelector("input[name='drug']")
        let quantity = document.querySelector("input[name='quantity']")
        let input = [code,drug,quantity]
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
        document.querySelector("#drugTable").innerHTML = ""
        data.forEach((e, i) => {
            document.querySelector("#drugTable").innerHTML += row(e, i)
        });
    }
    function row(datainput, i) {
        [code,drug,quantity] = datainput
        return `<tr class="border-b text-center">
                        <td class="p-2 text-center">${i}</td>
                        <td class="p-2 text-center">${code}</td>
                        <td class="p-2 text-center">${drug}</td>
                        <td class="p-2 text-center">${quantity}</td>
                        <td class="py-2">
                            <button onclick="deleteItem(${i})" class="rounded-md bg-red-500 hover:bg-red-700 p-2">
                                <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.167 5.50002H18.3337V7.16669H16.667V18C16.667 18.221 16.5792 18.433 16.4229 18.5893C16.2666 18.7456 16.0547 18.8334 15.8337 18.8334H4.16699C3.94598 18.8334 3.73402 18.7456 3.57774 18.5893C3.42146 18.433 3.33366 18.221 3.33366 18V7.16669H1.66699V5.50002H5.83366V3.00002C5.83366 2.77901 5.92146 2.56704 6.07774 2.41076C6.23402 2.25448 6.44598 2.16669 6.66699 2.16669H13.3337C13.5547 2.16669 13.7666 2.25448 13.9229 2.41076C14.0792 2.56704 14.167 2.77901 14.167 3.00002V5.50002ZM15.0003 7.16669H5.00033V17.1667H15.0003V7.16669ZM7.50033 3.83335V5.50002H12.5003V3.83335H7.50033Z"
                                    fill="white" />
                            </svg>
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
                name: e[1],
                quantity: parseInt(e[2]),
            };
        });
        document.querySelector("input[name='transaction']").value = JSON.stringify(data)
        document.querySelector("form").submit()
    }
    </script>
@endsection
