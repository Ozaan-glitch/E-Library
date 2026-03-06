@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
    <h1 class="mb-5">Welcome to Create Author</h1>

    <form action="{{ route('penulis.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name_author" class="block text-sm font-medium text-gray-700">Name Author</label>
            <input type="text" name="name_author" id="name_author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div class="mb-4">
            <label for="age_author" class="block text-sm font-medium text-gray-700">Age Author</label>
            <input type="number" name="age" id="age_author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div class="mb-4">
            <label for="address_author" class="block text-sm font-medium text-gray-700">Alamat Author</label>
            <input type="text" name="alamat" id="alamat_author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Author</button>
    </form>
    </div>
@endsection


