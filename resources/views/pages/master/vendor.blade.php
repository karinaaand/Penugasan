@extends('layouts.main')
@section('container')
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <!-- Form Section -->
        <div class="flex justify-between mb-4">
            <div>
                <button onclick="showTambahModal()"
                    class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">+
                    Tambah</button>
            </div>
            <div class="flex justify-end">
                <form action="">
                    <input type="text" name="vendor-search" id="vendor-search" placeholder="Search..."
                        class="ring-2 ring-gray-300 rounded-full px-6 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </form>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-center">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-6 w-1">No</th>
                        <th class="py-3 px-6">Nama Vendor</th>
                        <th class="py-3 px-6">Telepon</th>
                        <th class="py-3 px-6">Alamat</th>
                        <th class="py-3 px-6">Action</th>
                    </tr>
                </thead>
                <tbody id="vendor-data">
                    {{-- Data will be populated by JavaScript --}}
                </tbody>
                <tbody id="vendor-value"></tbody>
            </table>
        </div>

        <!-- Pagination and Showing Info Section -->
        <div class="flex items-center justify-between p-4">
            <div>
                <p class="text-gray-700 text-sm" id="pagination-info">
                    Showing 0 to 0 of 0 results
                </p>
            </div>
            <div id="pagination-div">
                {{-- Pagination will be populated by JavaScript --}}
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                onclick="closeTambahModal()">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <h2 class="text-center text-xl font-semibold mb-6">Tambah Vendor</h2>
            <form id="create-vendor-form">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="name" name="name" placeholder="Masukkan Nama">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="phone">Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="phone" name="phone" placeholder="Masukkan Telepon">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="address">Alamat</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="address" name="address" placeholder="Masukkan Alamat">
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <button type="button" id="closeModal" onclick="closeTambahModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300 bg-gray-200 hover:bg-gray-300 w-full flex-1">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-700 rounded-lg w-full flex-1">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                onclick="closeEditModal()">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <h2 class="text-center text-xl font-semibold mb-6">Ubah Vendor</h2>
            <form id="edit-vendor-form" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-start text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-start text-gray-700 mb-2" for="phone">Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="phone" name="phone">
                </div>
                <div class="mb-6">
                    <label class="block text-start text-gray-700 mb-2" for="address">Alamat</label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="text" id="address" name="address">
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <button type="button" id="closeModal" onclick="closeEditModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300 bg-gray-200 hover:bg-gray-300 w-full flex-1">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-700 rounded-lg w-full flex-1">Edit</button>
                </div>
            </form>
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
        let selectedId;
        let query = "";
        let temporaryData;
        let data_vendor = null;

        // DOM Elements
        const vendorInput = document.getElementById('vendor-search');

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
        vendorInput.addEventListener('input', handleSearchInput);
        document.getElementById('create-vendor-form').addEventListener('submit', handleCreateForm);
        document.getElementById('edit-vendor-form').addEventListener('submit', handleEditForm);

        // Initialize Page
        function initializePage() {
            if (token) {
                fetchVendors();
            }
        }

        // API Functions
        function fetchVendors(searchQuery = '', page = 1) {
            api.get(`/vendors?per_page=${per_page}&search=${searchQuery}&page=${page}`)
                .then(response => {
                    data_vendor = response.data;
                    renderVendorTable(data_vendor);
                    updatePaginationInfo(data_vendor.data);
                })
                .catch(error => {
                    console.error('Gagal mengambil data vendor:', error);
                });
        }

        // Event Handlers
        function handleSearchInput() {
            clearTimeout(timeout);
            query = this.value;

            timeout = setTimeout(() => {
                if (query.length > 0) {
                    api.get(`/vendors/search?search=${query}&per_page=${per_page}`)
                        .then(response => {
                            temporaryData = response.data;
                            renderVendorTable(temporaryData);
                            updatePaginationInfo(temporaryData.data);
                        });
                } else {
                    renderVendorTable(data_vendor);
                    updatePaginationInfo(data_vendor.data);
                }
            }, 400);
        }

        function handleCreateForm(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());

            console.log(data);
            delete data._token;
            console.log(data);

            api.post('/vendors', data)
                .then(response => {
                    closeTambahModal();
                    fetchVendors();
                    e.target.reset();
                })
                .catch(error => {
                    console.error('Gagal menambahkan vendor:', error);
                });
        }

        function handleEditForm(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());

            api.put(`/vendors/${selectedId}`, data)
                .then(response => {
                    closeEditModal();
                    fetchVendors();
                })
                .catch(error => {
                    console.error('Gagal mengupdate vendor:', error);
                });
        }

        // UI Functions
        function showTambahModal() {
            document.getElementById('tambahModal').classList.remove('hidden');
        }

        function closeTambahModal() {
            document.getElementById('tambahModal').classList.add('hidden');
        }

        function showEditModal(name, phone, address, id) {
            document.querySelector('#editModal input[name="name"]').value = name;
            document.querySelector('#editModal input[name="phone"]').value = phone;
            document.querySelector('#editModal input[name="address"]').value = address;
            selectedId = id;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function renderVendorTable(data) {
            const tbody = document.getElementById("vendor-data");
            tbody.innerHTML = ""; // Clear existing rows

            data.data.data.forEach((item, index) => {
                const row = document.createElement("tr");
                row.className = "border-b border-gray-200 hover:bg-gray-100";

                // Create table cells
                const noCell = createTableCell("py-3 px-6", index + 1 + ((data.data.current_page-1) * per_page));
                const nameCell = createTableCell("py-3 px-6 text-left", item.name);
                const phoneCell = createTableCell("py-3 px-6", item.phone);
                const addressCell = createTableCell("py-3 px-6 text-left", item.address);
                const actionCell = createActionCell(item);

                // Append cells to row
                row.appendChild(noCell);
                row.appendChild(nameCell);
                row.appendChild(phoneCell);
                row.appendChild(addressCell);
                row.appendChild(actionCell);

                // Append row to table
                tbody.appendChild(row);
            });

            // Render pagination
            renderPagination(data);
        }

        function createTableCell(className, content) {
            const cell = document.createElement("td");
            cell.className = className;
            cell.textContent = content;
            return cell;
        }

        function createActionCell(item) {
            const cell = document.createElement("td");
            cell.className = "py-3 px-6 flex justify-center";

            // Edit button
            const editBtn = document.createElement("a");
            editBtn.className = "flex cursor-pointer items-center bg-yellow-300 text-white text-sm px-2 py-2 rounded-lg shadow hover:bg-yellow-400 mr-2";
            editBtn.setAttribute("title", "Edit");
            editBtn.innerHTML = `
                <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.728 9.68602L14.314 8.27202L5 17.586V19H6.414L15.728 9.68602ZM17.142 8.27202L18.556 6.85802L17.142 5.44402L15.728 6.85802L17.142 8.27202ZM7.242 21H3V16.757L16.435 3.32202C16.6225 3.13455 16.8768 3.02924 17.142 3.02924C17.4072 3.02924 17.6615 3.13455 17.849 3.32202L20.678 6.15102C20.8655 6.33855 20.9708 6.59286 20.9708 6.85802C20.9708 7.12319 20.8655 7.37749 20.678 7.56502L7.243 21H7.242Z" fill="white" />
                </svg>
            `;
            editBtn.onclick = () => showEditModal(item.name, item.phone, item.address, item.id);

            // Delete button
            const deleteBtn = document.createElement("button");
            deleteBtn.type = "button";
            deleteBtn.className = "bg-red-500 text-white text-sm px-2 py-2 rounded-lg shadow hover:bg-red-600";
            deleteBtn.setAttribute("title", "Delete");
            deleteBtn.innerHTML = `
                <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.167 5.50002H18.3337V7.16669H16.667V18C16.667 18.221 16.5792 18.433 16.4229 18.5893C16.2666 18.7456 16.0547 18.8334 15.8337 18.8334H4.16699C3.94598 18.8334 3.73402 18.7456 3.57774 18.5893C3.42146 18.433 3.33366 18.221 3.33366 18V7.16669H1.66699V5.50002H5.83366V3.00002C5.83366 2.77901 5.92146 2.56704 6.07774 2.41076C6.23402 2.25448 6.44598 2.16669 6.66699 2.16669H13.3337C13.5547 2.16669 13.7666 2.25448 13.9229 2.41076C14.0792 2.56704 14.167 2.77901 14.167 3.00002V5.50002ZM15.0003 7.16669H5.0003V17.1667H15.0003V7.16669ZM7.5003 3.83335V5.50002H12.5003V3.83335H7.5003Z" fill="white"/>
                </svg>
            `;
            deleteBtn.onclick = () => showDeleteConfirmation(item.id);

            cell.appendChild(editBtn);
            cell.appendChild(deleteBtn);

            return cell;
        }

        function showDeleteConfirmation(id) {
            if (confirm('Apakah Anda yakin ingin menghapus vendor ini?')) {
                api.delete(`/vendors/${id}`)
                    .then(response => {
                        fetchVendors();
                    })
                    .catch(error => {
                        console.error('Gagal menghapus vendor:', error);
                    });
            }
        }

        function updatePaginationInfo(data) {
            const start = ((data.current_page - 1) * data.per_page) + 1;
            const end = Math.min(data.current_page * data.per_page, data.total);
            const total = data.total;

            document.getElementById('pagination-info').textContent =
                `Showing ${start} to ${end} of ${total} results`;
        }

        function renderPagination(data) {
            const currentPage = data.data.current_page;
            const lastPage = data.data.last_page;

            let elements = '<nav class="isolate inline-flex -space-x-px rounded-md shadow-xs" aria-label="Pagination">';

            // Previous button
            elements += `<span onclick="${currentPage === 1 ? '' : `getDataPage(${currentPage - 1})`}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium
                ${currentPage === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 cursor-pointer hover:bg-gray-50'}
                bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                ${currentPage === 1 ? 'disabled aria-disabled="true"' : ''}>
                &lsaquo;
                </span>`;

            // Page buttons
           for (let i = 1; i < data.data.links.length - 1; i++) {
                elements += '<span onclick="getDataPage(' + i + ')" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">' + data.data.links[i].label + '</span>';
            }

            // Next button
            elements += `<span onclick="${currentPage === lastPage ? '' : `getDataPage(${currentPage + 1})`}"
                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium
                ${currentPage === lastPage ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 cursor-pointer hover:bg-gray-50'}
                bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                ${currentPage === lastPage ? 'disabled aria-disabled="true"' : ''}>
                &rsaquo;
                </span>`;
            elements += '</nav>';

            document.getElementById("pagination-div").innerHTML = elements;
        }

        // Pagination handler
        function getDataPage(page) {
            if (query.length > 0) {
                api.get(`/vendors/search?search=${query}&per_page=${per_page}&page=${page}`)
                    .then(response => {
                        temporaryData = response.data;
                        renderVendorTable(temporaryData);
                        updatePaginationInfo(temporaryData.data);
                    });
            } else {
                fetchVendors('', page);
            }
        }

        // Initialize data on page load
        initializePage();
    </script>
@endsection
