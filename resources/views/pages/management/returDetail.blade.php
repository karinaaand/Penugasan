@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('container')
<div class="rounded-lg bg-white p-6 shadow-lg grid grid-cols-2">
    <div class="flex flex-col gap-6">
        <div>
            <label class="block text-md font-bold">Nama Obat</label>
            <p class="mt-1 text-gray-600">{{ $retur->drug()->name }}</p>
        </div>
        <div>
            <label class="block text-md font-bold">Produsen</label>
            <p class="mt-1 text-gray-600">{{ $retur->drug()->manufacture()->name }}</p>
        </div>
        <div>
            <label class="block text-md font-bold">Tanggal Expired</label>
            <p class="mt-1 text-gray-600">{{ Carbon::parse($retur->detail()->expired)->translatedFormat('j F Y') }}</p>
        </div>
        <div>
            <label class="block text-md font-bold">Tanggal Dibuang</label>
            <p class="mt-1 text-gray-600">{{ Carbon::parse($retur->created_at)->translatedFormat('j F Y') }}</p>
        </div>
    </div>
    <div class="flex flex-col gap-6">
        <div>
            <label class="block text-md font-bold">Kode Transaksi</label>
            <p class="mt-1 text-gray-600">{{ $retur->transaction()->code }}</p>
        </div>
        <div>
            <label class="block text-md font-bold">Vendor Pengirim</label>
            <p class="mt-1 text-gray-600">{{ $retur->transaction()->vendor()->name }}</p>
        </div>
        <div class="flex">
            <input value="{{ $retur->quantity/$retur->drug()->piece_netto }}" disabled class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="0">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md">
                pcs
            </span>
        </div>
        <textarea disabled name="inputReason" rows="4" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $retur->reason }}</textarea>
        @if ($retur->status == "Belum Kembali")
            <div class="justify-end flex">
                <form id="edit-retur-form" action="{{ route('management.retur.pay',$retur->id) }}" method="POST">
                    @csrf
                </form>
                <button onclick="showModal('save','edit-retur-form')" class="mt-3 bg-orange-500 hover:bg-orange-700 py-1 px-4 rounded-md text-white">Diterima</button>
    
            </div>
                
            @endif
    </div>
</div>
@endsection