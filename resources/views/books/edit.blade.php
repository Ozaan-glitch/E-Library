@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Mengedit = {{ $book->judul }}</h1>

@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 rounded mb-6">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <div class="w-full max-w-3xl bg-white shadow-xl rounded-2xl p-8">

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Judul Buku</label>
                <input type="text" name="judul" value="{{ $book->judul }}"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Sinopsis</label>
                <input type="text" name="sinopsis" value="{{ $book->sinopsis }}"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Genre</label>
                <select name="genre_id"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">---- Genre ----</option>
                    @foreach ($genres as $item)
                        <option value="{{ $item->id }}"
                            {{ $book->genre_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name_genre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Author</label>
                <select name="author_id"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">---- Author ----</option>
                    @foreach ($authors as $key)
                        <option value="{{ $key->id }}"
                            {{ $book->author_id == $key->id ? 'selected' : '' }}>
                            {{ $key->name_author }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Book Cover</label>
                <input type="file" name="image" id="imageInput"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                <img src="{{ asset('storage/'.$book->image) }}"
                    class="mt-4 w-40 rounded-lg shadow"
                    id="previewImage">
            </div>

            <button type="submit"
                class="px-6 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
                Save Book
            </button>
        </form>

    </div>
</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const preview = document.getElementById('previewImage');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });
</script>

@endsection