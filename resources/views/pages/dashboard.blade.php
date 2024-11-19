@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')
@section('container')
<div class="grid grid-cols-2 gap-10">
    <div class="w-full">
        <div class="w-full rounded-lg shadow-lg py-6">
            <div class="bg-white rounded-lg p-4 md:col-span-2 h-[70vh]">
                <div class="bg-red-500 m-auto text-white text-center py-1 px-6 rounded-full mb-6 w-max text-sm font-semibold" style="border-radius: 9999px;">NOTIFIKASI 🔔
                </div>
                <div class="flex justify-between space-x-2 mb-4">
                    <button onclick="filterNotifications('all', this)" class="filter-btn bg-blue-500 text-white px-3 py-1 rounded-full flex-grow">ALL</button>
                    <button onclick="filterNotifications('expired', this)" class="filter-btn bg-blue-200 text-white px-3 py-1 rounded-full flex-grow">EXPIRED</button>
                    <button onclick="filterNotifications('stok', this)" class="filter-btn bg-blue-200 text-white px-3 py-1 rounded-full flex-grow">STOK</button>
                    <button onclick="filterNotifications('jatuh-tempo', this)" class="filter-btn bg-blue-200 text-white px-3 py-1 rounded-full flex-grow">JATUH TEMPO</button>
                </div>
                <ul id="notification-list" class="space-y-4 max-h-[50vh] overflow-y-auto">
                    <li class="notification-item all jatuh-tempo flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-yellow-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M19.4 15a8 8 0 11-14.8 0m14.8 0A7.97 7.97 0 0112 17m0-2a7.97 7.97 0 014.8-1.8m-4.8 1.8A7.97 7.97 0 017.2 15"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Tagihan Obat Masuk 1</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs">Jatuh Tempo</span>
                    </li>
                    <li class="notification-item all jatuh-tempo flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-yellow-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M19.4 15a8 8 0 11-14.8 0m14.8 0A7.97 7.97 0 0112 17m0-2a7.97 7.97 0 014.8-1.8m-4.8 1.8A7.97 7.97 0 017.2 15"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Tagihan Obat Masuk 2</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs">Jatuh Tempo</span>
                    </li>
                    <li class="notification-item all stok flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m-5 2a9 9 0 100 9m0 0a9 9 0 0018 0"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Obat 23</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Stok Menipis</span>
                    </li>
                    <li class="notification-item all expired flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h1m-1-4h.01"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Obat 15</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Akan Expired</span>
                    </li>
                    <li class="notification-item all expired flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h1m-1-4h.01"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Obat 15</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Akan Expired</span>
                    </li>
                    <li class="notification-item all expired flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h1m-1-4h.01"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Obat 15</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Akan Expired</span>
                    </li>
                    <li class="notification-item all expired flex items-center justify-between px-4 py-2 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h1m-1-4h.01"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Obat 15</p>
                                <p class="text-xs text-gray-500">21 Jul | 08:20-10:30</p>
                            </div>
                        </div>
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Akan Expired</span>
                    </li>
                </ul>
            </div>
            <div id="unread-indicator" class="text-center text-blue-500 font-semibold">
                <span>Scroll ke bawah untuk melihat semua notifikasi...</span>
            </div>
        </div>
        <div class="w-full rounded-lg shadow-lg p-6 mt-5">
            <h1 class="font-bold text-lg">Penjualan Obat Terbanyak</h1>
            <canvas id="obat"></canvas>
        </div>
    </div>
    <div class="w-full">
        <div class="w-full rounded-lg shadow-lg p-6">
            <h1 class="font-bold text-lg">Grafik Keuntungan Penjualan Obat 7 Hari Terakhir</h1>
            <canvas id="penjualan"></canvas>
            <div class="flex justify-between">
                <div>
                    <h1 class="font-bold text-lg">Hari dengan Keuntungan Tertinggi</h1>
                    <h1 class="text-gray-400 font-bold text-lg">Kamis</h1>
                </div>
                <div class="mb-4">
                    <a href="{{ route('report.transactions.index') }}">
                        <button
                            class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors duration-200">></button>
                    </a>
                </div>
            </div>

        </div>
        <div class="w-full rounded-lg shadow-lg p-6 mt-2">
            <h1 class="font-bold text-lg text-center">Riwayat Transaksi Terakhir</h1>
            <div class="mt-6">
                <table class="w-full text-sm">
                    <thead>
                        <th class="py-3 px-6 text-center">No Transaksi</th>
                        <th class="py-3 px-6 text-center">Tanggal</th>
                        <th class="py-3 px-6 text-center">Subtotal</th>
                    </thead>
                </table>
            </div>
            <div class="overflow-auto max-h-[50vh]">
                <table class="w-full text-sm">
                    <tbody>
                        @foreach ($histories as $item)
                        <tr>
                        <td class="text-center py-3">{{ $item->code }}</td>
                        <td class="text-center py-3">{{ Carbon::parse($item->created_at)->translatedFormat('j F Y') }}</td>
                        <td class="text-center py-3">{{ 'Rp ' . number_format($item->income, 0, ',', '.') }}</td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="unread-indicator" class="text-center mt-2 text-blue-500 font-semibold">
                <span>Scroll ke bawah untuk melihat semua transaksi...</span>
            </div>
        </div>
    </div>
</div>
<script>
    function filterNotifications(category, button) {
        const notifications = document.querySelectorAll('.notification-item');
        const buttons = document.querySelectorAll('.filter-btn');
        notifications.forEach(notification => {
            if (category === 'all') {
                notification.style.display = 'flex';
            } else {
                if (notification.classList.contains(category)) {
                    notification.style.display = 'flex';
                } else {
                    notification.style.display = 'none';
                }
            }
        });

        buttons.forEach(btn => {
            btn.classList.remove('bg-blue-500', 'translate-y-[-10px]');
            btn.classList.add('bg-blue-200');
        });
        button.classList.add('bg-blue-500','translate-y-[-10px]');
        button.classList.remove('bg-blue-200');
    }

    const obat = document.getElementById('obat')
    const penjualan = document.getElementById('penjualan')
    new Chart(obat, {
        type: 'bar',
        data: {
            labels: ["Obat 1", "Obat 2", "Obat 3", "Obat 4", "Obat 5"],
            datasets: [{
                axis: "y",
                label: '# jumlah obat',
                data: [20, 18, 16, 14, 12],
                fill: true,
                backgroundColor: [
                    '#4E80FFFF',
                    '#4E80FFD9',
                    '#4E80FFB3',
                    '#4E80FF8C',
                    '#4E80FF66'
                ],
                borderRadius: 10
            }]
        },
        options: {
            indexAxis: "y",
            plugins: {
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        plugins: [{
            id: 'displayNumbersInside',
            afterDatasetsDraw: function(chart) {
                const ctx = chart.ctx;
                chart.data.datasets.forEach((dataset, index) => {
                    const meta = chart.getDatasetMeta(index);
                    meta.data.forEach((bar, i) => {
                        const value = dataset.data[i];
                        const xPos = bar.x - 20; // Posisi angka di dalam bar (kiri)
                        const yPos = bar.y + 2; // Pindahkan angka lebih ke atas
                        ctx.fillStyle = '#fff'; // Warna teks (putih agar terlihat di batang)
                        ctx.font = '18px Arial'; // Gaya teks
                        ctx.textAlign = 'right'; // Teks rata kanan
                        ctx.fillText(value, xPos, yPos);
                    });
                });
            }
        }]
    });

    let dataset = [12, 19, 10, 53, 51, 5, 20];
    new Chart(penjualan, {
        type: 'bar',
        data: {
            labels: ["S", "S", "R", "K", "J", "S", "M"],
            datasets: [{
                axis: "X",
                label: '# of Votes',
                data: dataset,
                fill: true,
                backgroundColor: [
                    getColor(dataset, dataset[0]),
                    getColor(dataset, dataset[1]),
                    getColor(dataset, dataset[2]),
                    getColor(dataset, dataset[3]),
                    getColor(dataset, dataset[4]),
                    getColor(dataset, dataset[5]),
                    getColor(dataset, dataset[6]),
                ],
                borderRadius: 10
            }]
        },
        options: {
            indexAxis: "x",
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function getColor(data, needle) {
        let sortedData = [...data].sort((a, b) => b - a);
        let rank = sortedData.indexOf(needle);
        if (rank === -1) {
            return -1;
        }
        return rank < 3 ? '#4E80FF' : '#4E80FF7F';
    }
</script>
@endsection