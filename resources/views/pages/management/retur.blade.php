@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('container')
    <div class="max-w-8xl w-full rounded-xl bg-white p-6 shadow-md">
        <div class="flex items-center justify-between w-full">
            <form action="" class="flex w-auto flex-row justify-between gap-3">
                <input class="rounded-sm px-2 py-1 ring-2 ring-gray-500" type="date" name="start"
                    value="{{ $_GET['start'] ?? '' }}" />
                <h1 class="text-lg font-inter text-gray-800">sampai</h1>
                <input class="rounded-sm px-2 py-1 ring-2 ring-gray-500" type="date" name="end"
                    value="{{ $_GET['end'] ?? '' }}" />
                <button class="rounded-2xl bg-blue-500 px-3 font-bold text-sm font-inter text-white hover:bg-blue-600"
                    type="submit">
                    TERAPKAN
                </button>
            </form>
            <form action="" class="flex">
                <input type="text" name="" id="retur-search" placeholder="Search..."
                    class="rounded-full px-6 py-2 ring-2 ring-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </form>
        </div>
        <div class="overflow-hidden rounded-lg bg-white shadow-md mt-6">
            <table class="min-w-full text-sm text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Kode Retur</th>
                        <th class="px-6 py-3">Nama Obat</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Tanggal Retur</th>
                        <th class="px-6 py-3">Tanggal Kembali</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="drug-data">
                    {{-- Data will be populated by JavaScript --}}
                </tbody>
                <!-- <tbody id="retur-value"></tbody> -->
                <!-- <tbody id="retur-data" class="text-gray-700">
                    @foreach ($returs as $number => $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3">{{ $number + 1 }}</td>
                            <td class="px-6 py-3">{{ $item->transaction()->code }}</td>
                            <td class="px-6 py-3 text-left">{{ $item->drug()->name }}</td>
                            <td class="px-6 py-3">{{ $item->detail()->quantity }}</td>
                            <td class="px-6 py-3">{{ Carbon::parse($item->created_at)->translatedFormat('j F Y') }}</td>
                            <td class="px-6 py-3">
                                {{ $item->arrive ? Carbon::parse($item->arrive)->translatedFormat('j F Y') : '-' }}</td>

                            <td class="flex justify-center py-3">
                                <a href="{{ route('management.retur.show', $item->id) }}"
                                    class="rounded-md bg-blue-500 p-2 hover:bg-blue-600">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.99972 2.5C14.4931 2.5 18.2314 5.73333 19.0156 10C18.2322 14.2667 14.4931 17.5 9.99972 17.5C5.50639 17.5 1.76805 14.2667 0.983887 10C1.76722 5.73333 5.50639 2.5 9.99972 2.5ZM9.99972 15.8333C11.6993 15.833 13.3484 15.2557 14.6771 14.196C16.0058 13.1363 16.9355 11.6569 17.3139 10C16.9341 8.34442 16.0038 6.86667 14.6752 5.80835C13.3466 4.75004 11.6983 4.17377 9.99972 4.17377C8.30113 4.17377 6.65279 4.75004 5.3242 5.80835C3.9956 6.86667 3.06536 8.34442 2.68555 10C3.06397 11.6569 3.99361 13.1363 5.32234 14.196C6.65106 15.2557 8.30016 15.833 9.99972 15.8333V15.8333ZM9.99972 13.75C9.00516 13.75 8.05133 13.3549 7.34807 12.6516C6.64481 11.9484 6.24972 10.9946 6.24972 10C6.24972 9.00544 6.64481 8.05161 7.34807 7.34835C8.05133 6.64509 9.00516 6.25 9.99972 6.25C10.9943 6.25 11.9481 6.64509 12.6514 7.34835C13.3546 8.05161 13.7497 9.00544 13.7497 10C13.7497 10.9946 13.3546 11.9484 12.6514 12.6516C11.9481 13.3549 10.9943 13.75 9.99972 13.75ZM9.99972 12.0833C10.5523 12.0833 11.0822 11.8638 11.4729 11.4731C11.8636 11.0824 12.0831 10.5525 12.0831 10C12.0831 9.44747 11.8636 8.91756 11.4729 8.52686C11.0822 8.13616 10.5523 7.91667 9.99972 7.91667C9.44719 7.91667 8.91728 8.13616 8.52658 8.52686C8.13588 8.91756 7.91639 9.44747 7.91639 10C7.91639 10.5525 8.13588 11.0824 8.52658 11.4731C8.91728 11.8638 9.44719 12.0833 9.99972 12.0833Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody> -->
            </table>
        </div>
        <div class="p-6">
            {{ $returs->links() }}
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Configuration
        const API_BASE_URL = 'https://simbat.madanateknologi.web.id/api/v1';
        const per_page = 5;
        const token = localStorage.getItem('token');

        // State variables
        let timeout = null;
        let query = "";
        let temporaryData;
        let data_drug = null;
        let selectedId;

        const categoryInput = document.getElementById('retur-search')

        // API Client
        const api = axios.create({
            baseURL: API_BASE_URL,
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            }
        });

        // Event Listeners
        document.addEventListener('DOMContentLoaded', initializePage);
        // drugInput.addEventListener('input', handleSearchInput);

        // Initialize Page
        function initializePage() {
            if (token) {
                fetchDrugs();
            }
        }

        // API Functions
        function fetchDrugs(searchQuery = '', page = 1) {
            api.get(`/management/returns?per_page=${per_page}&search=${searchQuery}&page=${page}`)
                .then(response => {
                    data_drug = response.data;
                    console.log('Data obat:', data_drug);
                    renderDrugTable(data_drug);
                    updatePaginationInfo(data_drug.data);
                })
                .catch(error => {
                    console.error('Gagal mengambil data retur:', error);
                });
        }



        categoryInput.addEventListener('input', function() {
            clearTimeout(timeout);
            const query = this.value;
            timeout = setTimeout(() => {
                if (query.length > 0) {
                    document.getElementById('retur-data').classList.add('hidden')
                    document.getElementById('retur-value').classList.remove('hidden')
                    fetch(`/management-search?query=${query}&variant=retur`)
                        .then(response => response.json())
                        .then(data => {
                            const suggestions = document.getElementById('retur-value');
                            suggestions.innerHTML = '';

                            if (data.length > 0) {
                                data.forEach((item, number) => {
                                    console.log(item)
                                    suggestions.innerHTML += generateTableRow(item, number)
                                });
                            }
                        });
                } else {
                    document.getElementById('retur-data').classList.remove('hidden')
                    document.getElementById('retur-value').classList.add('hidden')
                }
            }, 400);
        });

        function renderDrugTable(data) {
            const tbody = document.getElementById("drug-data");
            tbody.innerHTML = ""; // Clear existing rows

            data.data.data.forEach((item, index) => {
                const row = document.createElement("tr");
                row.className = "border-b border-gray-200 hover:bg-gray-100";

                // Create table cells
                const noCell = createTableCell("py-3 px-6", index + 1 + ((data.data.current_page-1) * per_page));
                const codeCell = createTableCell("py-3 px-6", item.code);
                const nameCell = createTableCell("py-3 px-6 text-left", item.name);
                const actionCell = createActionCell(item);

                // Append cells to row
                row.appendChild(noCell);
                row.appendChild(codeCell);
                row.appendChild(nameCell);
                row.appendChild(actionCell);

                // Append row to table
                tbody.appendChild(row);
            });

            // Render pagination
            renderPagination(data);
        }


        // categoryInput.addEventListener('input', function() {
        //     clearTimeout(timeout);
        //     const query = this.value;
        //     timeout = setTimeout(() => {
        //         if (query.length > 0) {
        //             document.getElementById('retur-data').classList.add('hidden')
        //             document.getElementById('retur-value').classList.remove('hidden')
        //             fetch(`/management-search?query=${query}&variant=retur`)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     const suggestions = document.getElementById('retur-value');
        //                     suggestions.innerHTML = '';

        //                     if (data.length > 0) {
        //                         data.forEach((item, number) => {
        //                             console.log(item)
        //                             suggestions.innerHTML += generateTableRow(item, number)
        //                         });
        //                     }
        //                 });
        //         } else {
        //             document.getElementById('retur-data').classList.remove('hidden')
        //             document.getElementById('retur-value').classList.add('hidden')
        //         }
        //     }, 400);
        // });

        function formatDate(date) {
            return new Date(date).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        }

        // Fungsi untuk format currency
        function formatCurrency(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }

        function generateTableRow(item, number) {
            let createdAt = formatDate(item.created_at);
            let arriveDate = item.arrive ? formatDate(item.arrive) : "-";
            let transactionCode = item.trans ? item.trans.code : "-";
            let drugName = item.drug ? item.drug.name : "-";
            let quantity = item.detail ? item.detail.quantity : "-";
            let routeUrl = `/management/retur/${item.id}`;

            return `
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="px-6 py-3">${number + 1}</td>
            <td class="px-6 py-3">${transactionCode}</td>
            <td class="px-6 py-3 text-left">${drugName}</td>
            <td class="px-6 py-3">${quantity}</td>
            <td class="px-6 py-3">${createdAt}</td>
            <td class="px-6 py-3">${arriveDate}</td>
            <td class="flex justify-center py-3">
                <a href="${routeUrl}" class="rounded-md bg-blue-500 p-2 hover:bg-blue-600">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99972 2.5C14.4931 2.5 18.2314 5.73333 19.0156 10C18.2322 14.2667 14.4931 17.5 9.99972 17.5C5.50639 17.5 1.76805 14.2667 0.983887 10C1.76722 5.73333 5.50639 2.5 9.99972 2.5ZM9.99972 15.8333C11.6993 15.833 13.3484 15.2557 14.6771 14.196C16.0058 13.1363 16.9355 11.6569 17.3139 10C16.9341 8.34442 16.0038 6.86667 14.6752 5.80835C13.3466 4.75004 11.6983 4.17377 9.99972 4.17377C8.30113 4.17377 6.65279 4.75004 5.3242 5.80835C3.9956 6.86667 3.06536 8.34442 2.68555 10C3.06397 11.6569 3.99361 13.1363 5.32234 14.196C6.65106 15.2557 8.30016 15.833 9.99972 15.8333V15.8333ZM9.99972 13.75C9.00516 13.75 8.05133 13.3549 7.34807 12.6516C6.64481 11.9484 6.24972 10.9946 6.24972 10C6.24972 9.00544 6.64481 8.05161 7.34807 7.34835C8.05133 6.64509 9.00516 6.25 9.99972 6.25C10.9943 6.25 11.9481 6.64509 12.6514 7.34835C13.3546 8.05161 13.7497 9.00544 13.7497 10C13.7497 10.9946 13.3546 11.9484 12.6514 12.6516C11.9481 13.3549 10.9943 13.75 9.99972 13.75ZM9.99972 12.0833C10.5523 12.0833 11.0822 11.8638 11.4729 11.4731C11.8636 11.0824 12.0831 10.5525 12.0831 10C12.0831 9.44747 11.8636 8.91756 11.4729 8.52686C11.0822 8.13616 10.5523 7.91667 9.99972 7.91667C9.44719 7.91667 8.91728 8.13616 8.52658 8.52686C8.13588 8.91756 7.91639 9.44747 7.91639 10C7.91639 10.5525 8.13588 11.0824 8.52658 11.4731C8.91728 11.8638 9.44719 12.0833 9.99972 12.0833Z" fill="white" />
                    </svg>
                </a>
            </td>
        </tr>
    `;
        }
    // Initialize data on page load
    initializePage();
    </script>
@endsection
