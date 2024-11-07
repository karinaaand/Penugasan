@extends('layouts.main')
@section('container')
    <button onclick="showTambahModal()" class="bg-green-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-green-600 transition-colors duration-200">+ Tambah</button>
    <div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
            <h2 class="text-center text-xl font-semibold mb-6">Tambah Vendor</h2>
            <form action="{{ route('master.vendor.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="phone">Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="phone" name="phone">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="address">Alamat</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="address" name="address">
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <button type="button" id="closeModal" onclick="closeTambahModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300 w-full flex-1">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg w-full flex-1">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">NO</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Telepon</th>
                    <th class="py-3 px-6 text-left">ALamat</th>
                    <th class="py-3 px-6 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @foreach ($vendors as $number => $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $loop->iteration + ($vendors->currentPage() - 1) * $vendors->perPage() }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->phone }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->address }}</td>
                        <td class="py-3 px-6 text-center flex justify-center">
                            <a onclick="showEditModal('{{ $item->name }}','{{ $item->address }}','{{ $item->phone }}',{{ $item->id }})"
                                class="flex items-center bg-yellow-300 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-400 transition-colors duration-200 mr-2">
                                <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.728 9.68602L14.314 8.27202L5 17.586V19H6.414L15.728 9.68602ZM17.142 8.27202L18.556 6.85802L17.142 5.44402L15.728 6.85802L17.142 8.27202ZM7.242 21H3V16.757L16.435 3.32202C16.6225 3.13455 16.8768 3.02924 17.142 3.02924C17.4072 3.02924 17.6615 3.13455 17.849 3.32202L20.678 6.15102C20.8655 6.33855 20.9708 6.59286 20.9708 6.85802C20.9708 7.12319 20.8655 7.37749 20.678 7.56502L7.243 21H7.242Z" fill="black"/>
                                </svg>
                            </a>
                            <button type="button" onclick="showDeleteModal({{ $item->id }})"
                                class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                <svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.167 5.50002H18.3337V7.16669H16.667V18C16.667 18.221 16.5792 18.433 16.4229 18.5893C16.2666 18.7456 16.0547 18.8334 15.8337 18.8334H4.16699C3.94598 18.8334 3.73402 18.7456 3.57774 18.5893C3.42146 18.433 3.33366 18.221 3.33366 18V7.16669H1.66699V5.50002H5.83366V3.00002C5.83366 2.77901 5.92146 2.56704 6.07774 2.41076C6.23402 2.25448 6.44598 2.16669 6.66699 2.16669H13.3337C13.5547 2.16669 13.7666 2.25448 13.9229 2.41076C14.0792 2.56704 14.167 2.77901 14.167 3.00002V5.50002ZM15.0003 7.16669H5.00033V17.1667H15.0003V7.16669ZM7.50033 3.83335V5.50002H12.5003V3.83335H7.50033Z" fill="white"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $vendors->links() }}
    </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <p class="text-center text-lg font-semibold mb-4">Anda yakin untuk menghapus data ini?
            </p>
            <div class="flex justify-center space-x-4">
                <form id="deleteForm" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="reset" onclick="return closeDeleteModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                    <button onclick="submitDeleteForm()" class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
            <h2 class="text-center text-xl font-semibold mb-6">Edit Vendor</h2>
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-start text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-start text-gray-700 mb-2" for="phone">Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="phone" name="phone">
                </div>
                <div class="mb-6">
                    <label class="block text-start text-gray-700 mb-2" for="address">Alamat</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="address" name="address">
                </div>

                <div class="flex justify-center space-x-4 mt-4">
                    <button type="button" id="closeModal" onclick="closeEditModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300 w-full flex-1">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg w-full flex-1">Edit</button>
                </div>
            </form>
        </div>
    </div>
    @session('success')
    <div id="toast-success"
        class="fixed hidden right-5 top-5 mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
        role="alert">
        <div
            class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" onclick=""
            class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>  
    <script>
        const toast = document.getElementById('toast-success');
        toast.classList.remove('hidden'); // Tampilkan toast
        setTimeout(() => {
            document.getElementById('toast-success').classList.add('hidden');
        }, 2000);
        </script>      
    @endsession
@endsection

<script>
    function showDeleteModal(id) {
        console.log(id)
        document.getElementById('deleteForm').setAttribute('action', `vendor/${id}`)
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function showEditModal(name, address, phone, id) {
        document.querySelector('#editModal input[name="name"]').value = name;
        document.querySelector('#editModal input[name="address"]').value = address;
        document.querySelector('#editModal input[name="phone"]').value = phone;
        document.querySelector('#editModal form').setAttribute('action', `{{ route('master.vendor.index') }}/${id}`);
        document.getElementById('editModal').classList.remove('hidden');
    }

    function showTambahModal() {
        document.getElementById('tambahModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
    }

    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
    }
        
</script>
