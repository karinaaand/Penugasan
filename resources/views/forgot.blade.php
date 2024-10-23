@extends('layouts.form')
@section('container')
<div class="shadow-lg ring-black rounded-xl w-96 p-12">
  <h1 class="text-center text-3xl mb-8 font-bold">Forgot Password</h1>
  <form action="" >
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
      <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required />
    </div>
    <button type="submit" class="bg-lavender hover:bg-lavender-700 rounded-full text-white w-full py-2">Confirm</button>
  </form>

</div>
@endsection