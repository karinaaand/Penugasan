@extends('layouts.main')

@section('container')
    <!-- Tombol + Tambah yang membuka modal -->
    <button onclick="showTambahModal()" class="bg-indigo hover:bg-indigo-700 rounded-md p-2 text-white">+ Tambah</button>

    <!-- Modal -->
    <div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
            <h2 class="text-center text-xl font-semibold mb-6">Tambah Vendor</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="nama">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="nama" name="nama">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="telepon">Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="telepon" name="telepon">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="alamat">Alamat</label>
                    <input class="w-full px-3 py-2 border rounded-lg" type="text" id="alamat" name="alamat">
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
                    <th class="py-3 px-6 text-left">NAMA Vendor</th>
                    <th class="py-3 px-6 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <!-- Data Rows -->
                @foreach ($vendors as $number => $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $number + 1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                        <td class="py-3 px-6 text-center">
                            <!-- Tombol Edit -->
                            <a href="javascript:void(0)" onclick="showEditModal()"
                                class="bg-yellow-300 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-yellow-400 transition-colors duration-200 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16.586 2.586a2 2 0 00-2.828 0L7.757 9.414a2 2 0 00-.414.586L6 14l4-1.343a2 2 0 00.586-.414l6.829-6.829a2 2 0 000-2.828zM10 12L8 14l1.414-1.414L10 12zm1.586-1.414L16.293 6H14v-2h2.293l-4.707 4.707a1 1 0 00-.586.414z" />
                                </svg>
                                Edit
                            </a>
                            <!-- Modal -->
                            <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                                <div class="bg-white rounded-lg shadow-lg p-8 w-96">
                                    <h2 class="text-center text-xl font-semibold mb-6">Edit Vendor</h2>
                                    <form>
                                        <div class="mb-4">
                                            <label class="block text-start text-gray-700 mb-2" for="nama">Nama</label>
                                            <input class="w-full px-3 py-2 border rounded-lg" type="text" id="nama" name="nama">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-start text-gray-700 mb-2" for="telepon">Telepon</label>
                                            <input class="w-full px-3 py-2 border rounded-lg" type="text" id="telepon" name="telepon">
                                        </div>
                                        <div class="mb-6">
                                            <label class="block text-start text-gray-700 mb-2" for="alamat">Alamat</label>
                                            <input class="w-full px-3 py-2 border rounded-lg" type="text" id="alamat" name="alamat">
                                        </div>

                                        <div class="flex justify-end space-x-4">
                                            <button type="button" id="closeModal" onclick="closeEditModal()"
                                                class="px-4 py-2 border rounded-lg text-gray-700 border-gray-300">Cancel</button>
                                            <button type="submit" class="px-4 py-2 bg-lime-500 text-white rounded-lg">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Form untuk menghapus data -->
                            <form id="deleteForm" action="{{ route('master.vendor.destroy', $item->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')

                                <!-- Tombol Delete -->
                                <button type="button" onclick="showDeleteModal()"
                                    class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Delete
                                </button>
                            </form>

                            <!-- Modal Background -->
                            <div id="deleteModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
                                <!-- Modal Content -->
                                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                                    <p class="text-center text-lg font-semibold mb-4">Anda yakin untuk menghapus data ini?
                                    </p>
                                    <div class="flex justify-center space-x-4">
                                        <!-- Ubah pemanggilan fungsi closeModal() menjadi closeDeleteModal() -->
                                        <button onclick="closeDeleteModal()"
                                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700">Cancel</button>
                                        <button onclick="submitDeleteForm()"
                                            class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
        <!-- Pagination -->
        <div class="flex justify-end">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#"
                    class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100">
                    << /a>
                        <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                        <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                        <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                        <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                        <a href="#"
                            class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
            </nav>
        </div>
    </div>
    </div>
@endsection

<script>
    // Menampilkan modal
    function showDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function showEditModal() {
    document.getElementById('editModal').classList.remove('hidden');
    }

    function showTambahModal() {
        document.getElementById('tambahModal').classList.remove('hidden');
    }

    // Menyembunyikan modal
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    }

    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
    }
    // Mengirimkan form untuk menghapus data
    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
    }
</script>
