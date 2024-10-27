@extends('layouts.main')
@section('container')
    <form action="{{ route('master.vendor.update',$vendor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input value="{{ $vendor->name }}" type="text" placeholder="Nama" name="name">
        <input value="{{ $vendor->address }}" type="text" placeholder="Alamat" name="address">
        <input value="{{ $vendor->phone }}" type="text" placeholder="Telepon" name="phone">
        <button type="submit">Simpan</button>
    </form>
@endsection