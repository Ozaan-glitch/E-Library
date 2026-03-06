@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">

    <div class="w-full max-w-3xl bg-white rounded-3xl shadow-2xl p-10">

        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">
            📚 Create New Book
        </h1>

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-300 rounded-lg text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Judul Buku</label>
                <input type="text" name="judul" placeholder="Masukkan Judul Buku"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition" />
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Sinopsis</label>
                <textarea name="sinopsis" rows="4" placeholder="Masukkan Sinopsis"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition resize-none"></textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" placeholder="Masukkan Tahun Terbit"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition" />
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Genre</label>
                <select name="genre_id"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    <option value="">-- Pilih Genre --</option>
                    @foreach($genres as $item)
                        <option value="{{ $item->id }}">{{ $item->name_genre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Author</label>
                <select name="author_id"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    <option value="">-- Pilih Author --</option>
                    @foreach($authors as $key)
                        <option value="{{ $key->id }}">{{ $key->name_author }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Book Cover</label>
                <input type="file" name="image" id="imageInput"
                       class="w-full border border-gray-300 rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition" />

                <div class="mt-4">
                    <img id="previewImage" class="w-52 h-64 object-cover rounded-xl shadow-lg hidden transition-transform duration-300 hover:scale-105" />
                </div>
            </div>

            <button type="submit"
                    class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-semibold text-lg shadow-lg hover:scale-105 hover:shadow-indigo-400/50 transition transform">
                Save Book
            </button>
        </form>

    </div>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('previewImage');

    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if(file){
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>
@endsection