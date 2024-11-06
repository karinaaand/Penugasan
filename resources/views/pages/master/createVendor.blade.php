@extends('layouts.main')
@section('container')
    <form action="{{ route('master.vendor.store') }}" method="POST">
        @csrf
        <input type="text" placeholder="Nama" name="name" />
        <input type="text" placeholder="Alamat" name="address" />
        <input type="text" placeholder="Telepon" name="phone" />
        <button type="submit">Submit</button>
    </form>
@endsection
