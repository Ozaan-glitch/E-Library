<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Library</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

<x-navbar></x-navbar>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        title: "Success",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor:"#3085d6"
    });
});
</script>
@endif

<div class="container mx-auto p-6">

    <!-- SEARCH -->
    <div class="mb-8">
        <form method="GET" action="" class="flex justify-center">
            <input
                type="text"
                name="search"
                placeholder="Cari Buku..."
                class="w-full md:w-1/2 p-3 rounded-l-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
            />
            <button
                class="bg-blue-500 text-white px-6 rounded-r-xl hover:bg-blue-600 transition duration-300"
            >
                Search
            </button>
        </form>
    </div>

    <!-- GRID BUKU -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($books as $book)
        <a href="{{ route('books.detail', $book->id)}}" 
           class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 overflow-hidden flex flex-col">

            <!-- IMAGE -->
            <div class="h-72 w-full overflow-hidden rounded-t-2xl relative">
                <img
                    src="{{ asset('storage/'.$book->image) }}"
                    alt="{{ $book->judul }}"
                    class="h-full w-full object-cover object-center transition-transform duration-500 hover:scale-105"
                />
            </div>

            <!-- CONTENT -->
            <div class="p-4 flex-1 flex flex-col justify-between min-h-[220px]">
                <div>
                    <p class="text-sm text-gray-400">Dirilis: {{ $book->tahun_terbit }}</p>
                    <h2 class="text-lg font-semibold mt-1 truncate">{{ $book->judul }}</h2>
                    <p class="text-gray-500 text-sm mt-1 line-clamp-3">
                        {{ $book->sinopsis }}
                    </p>
                </div>

                <div class="mt-4 flex justify-between text-sm">
                    <div class="w-1/2">
                        <p class="text-gray-500">Author</p>
                        <p class="font-medium text-gray-700 truncate">{{ $book->author->name_author }}</p>
                    </div>
                    <div class="w-1/2 text-right">
                        <p class="text-gray-500">Genre</p>
                        <p class="font-medium text-gray-700 truncate">{{ $book->genre->name_genre }}</p>
                    </div>
                </div>
            </div>

        </a>
        @endforeach

    </div>

</div>

</body>
</html>