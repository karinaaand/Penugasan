@extends('layouts.main')
@section('container')
    <button onclick="showTambahModal()" class="bg-indigo hover:bg-indigo-700 rounded-md p-2 text-white">+ Tambah</button>
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
                <div class="flex justify-end space-x-4">
                    <button type="button" id="closeModal" onclick="closeTambahModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-lime-500 text-white rounded-lg">Tambah</button>
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
                        <td class="py-3 px-6 text-left">{{ $number + 1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->phone }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->address }}</td>
                        <td class="py-3 px-6 text-center">
                            <a onclick="showEditModal('{{ $item->name }}','{{ $item->address }}','{{ $item->phone }}',{{ $item->id }})"
                                class="bg-yellow-300 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-400 transition-colors duration-200 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16.586 2.586a2 2 0 00-2.828 0L7.757 9.414a2 2 0 00-.414.586L6 14l4-1.343a2 2 0 00.586-.414l6.829-6.829a2 2 0 000-2.828zM10 12L8 14l1.414-1.414L10 12zm1.586-1.414L16.293 6H14v-2h2.293l-4.707 4.707a1 1 0 00-.586.414z" />
                                </svg>
                                Edit
                            </a>
                            <button type="button" onclick="showDeleteModal({{ $item->id }})"
                                class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Delete
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

                <div class="flex justify-end space-x-4">
                    <button type="button" id="closeModal" onclick="closeEditModal()"
                        class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-lime-500 text-white rounded-lg">Edit</button>
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
