@extends('layouts.main')
@section('container')

<div class="p-6 bg-white rounded-lg shadow-lg">
<!-- Tombol CETAK -->
<div class="flex-1 justify-end flex">
    <button id="printButton" class="bg-yellow-400 text-black font-bold py-2 px-4 rounded-lg">CETAK</button>
</div>

<!-- Form lainnya dan tabel -->
<form action="" class="flex flex-row justify-between w-max gap-3">
    <input class="ring-2 ring-gray-500 py-1 px-2 rounded-sm" type="date" name="" id="">
    <h1>sampai</h1>
    <input class="ring-2 ring-gray-500 py-1 px-2 rounded-sm" type="date" name="" id="">
    <button class="bg-indigo px-2 py-1 rounded-full text-white font-bold text-xs hover:bg-indigo-800" type="submit">APPLY</button>
</form>

<!-- Opsi Cetak (disembunyikan pada awal) -->
<div id="printOptions" class="hidden mb-4">
    <label for="format" class="text-lg font-semibold">Pilih format cetak:</label>
    <select id="format" class="ml-2 border rounded-md">
        <option value="pdf">PDF</option>
        <option value="excel">Excel</option>
    </select>
    <button id="confirmPrint" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg ml-2">Download</button>
</div>

<div class="flex justify-end">
    <form action="">
        <input type="text" name="" id="" placeholder="Search..." class="ring-2 ring-gray-300 rounded-full px-6 py-2">
    </form>
</div>

<div class="shadow-lg mt-8 p-4 rounded-md">
    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-sm">
            <th class="py-4">NO</th>
            <th class="py-4">KODE OBAT</th>
            <th class="py-4">NAMA OBAT</th>
            <th class="py-4">STOK KONVERSI</th>
            <th class="py-4">EXP TERDEKAT</th>
            <th class="py-4">STATUS</th>
            <th class="py-4">ACTION</th>
        </thead>
        <tbody>
            @for ($i = 0; $i < 10; $i++)
            <tr>
                <td class="text-center py-3">{{ $i + 1 }}</td>
                <td class="text-center py-3">#AAA111</td>
                <td class="py-3">Paracetamol Gatau Apa Merk nya</td>
                <td class="text-center py-3">70 Box</td>
                <td class="text-center py-3">20 Januari 2024</td>
                <td class="text-center py-3">-</td>
                <td class="flex justify-center py-3">
                    <a href="{{ route('report.drugs.show', 1) }}" class="bg-lavender-200 hover:bg-lavender p-1 rounded-md">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99972 2.5C14.4931 2.5 18.2314 5.73333 19.0156 10C18.2322 14.2667 14.4931 17.5 9.99972 17.5C5.50639 17.5 1.76805 14.2667 0.983887 10C1.76722 5.73333 5.50639 2.5 9.99972 2.5ZM9.99972 15.8333C11.6993 15.833 13.3484 15.2557 14.6771 14.196C16.0058 13.1363 16.9355 11.6569 17.3139 10C16.9341 8.34442 16.0038 6.86667 14.6752 5.80835C13.3466 4.75004 11.6983 4.17377 9.99972 4.17377C8.30113 4.17377 6.65279 4.75004 5.3242 5.80835C3.9956 6.86667 3.06536 8.34442 2.68555 10C3.06397 11.6569 3.99361 13.1363 5.32234 14.196C6.65106 15.2557 8.30016 15.833 9.99972 15.8333V15.8333ZM9.99972 13.75C9.00516 13.75 8.05133 13.3549 7.34807 12.6516C6.64481 11.9484 6.24972 10.9946 6.24972 10C6.24972 9.00544 6.64481 8.05161 7.34807 7.34835C8.05133 6.64509 9.00516 6.25 9.99972 6.25C10.9943 6.25 11.9481 6.64509 12.6514 7.34835C13.3546 8.05161 13.7497 9.00544 13.7497 10C13.7497 10.9946 13.3546 11.9484 12.6514 12.6516C11.9481 13.3549 10.9943 13.75 9.99972 13.75ZM9.99972 12.0833C10.5523 12.0833 11.0822 11.8638 11.4729 11.4731C11.8636 11.0824 12.0831 10.5525 12.0831 10C12.0831 9.44747 11.8636 8.91756 11.4729 8.52686C11.0822 8.13616 10.5523 7.91667 9.99972 7.91667C9.44719 7.91667 8.91728 8.13616 8.52658 8.52686C8.13588 8.91756 7.91639 9.44747 7.91639 10C7.91639 10.5525 8.13588 11.0824 8.52658 11.4731C8.91728 11.8638 9.44719 12.0833 9.99972 12.0833Z" fill="black"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
<div class="flex justify-end items-center">
    <div class="flex justify-end items-center mt-4 gap-4">
        <div class="text-sm">Showing 1 to 10 of 50 entries</div>
        <!-- Pagination -->
        <div class="flex justify-end">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-l-md hover:bg-gray-100"><</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">1</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">2</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">...</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">10</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 rounded-r-md hover:bg-gray-100">></a>
            </nav>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener untuk tombol CETAK
        document.getElementById('printButton').addEventListener('click', function() {
            const printOptions = document.getElementById('printOptions');
            // Toggle opsi cetak: sembunyikan atau tampilkan
            if (printOptions.classList.contains('hidden')) {
                printOptions.classList.remove('hidden');
            } else {
                printOptions.classList.add('hidden');
            }
        });

        // Event listener untuk tombol konfirmasi cetak
        document.getElementById('confirmPrint').addEventListener('click', function() {
            const format = document.getElementById('format').value;
            if (format === 'pdf') {
                alert("Mencetak dalam format PDF...");
            } else if (format === 'excel') {
                alert("Mencetak dalam format Excel...");
            }
            document.getElementById('printOptions').classList.add('hidden');
        });
    });
</script>

