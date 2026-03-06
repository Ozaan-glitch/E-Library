@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-blue-50 py-14 px-6">

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 via-blue-500 to-blue-700 
                       bg-clip-text text-transparent">
                📚 Books Collection
            </h1>

            <a href="{{ route('books.create') }}" 
               class="px-6 py-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 
                      text-white font-semibold shadow-lg 
                      hover:scale-105 hover:shadow-blue-400/50 
                      transition duration-300">
                + Add Book
            </a>
        </div>

        {{-- Table Container --}}
        <div class="bg-blue-100/30 backdrop-blur-xl rounded-3xl shadow-2xl border border-blue-200 overflow-hidden">

            <table class="w-full text-left text-blue-900">
                <thead class="bg-blue-200/50 text-sm uppercase tracking-wider text-blue-800">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Cover</th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Sinopsis</th>
                        <th class="px-6 py-4">Tahun</th>
                        <th class="px-6 py-4">Genre</th>
                        <th class="px-6 py-4">Author</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-blue-200/40">

                    @foreach($books as $index => $book)
                    <tr class="hover:bg-blue-200/20 transition duration-300">

                        <td class="px-6 py-4 font-medium">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="relative group w-16 h-20">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-500 
                                            rounded-lg blur-md opacity-0 
                                            group-hover:opacity-60 transition duration-300">
                                </div>

                                <img src="{{ asset('storage/'.$book->image) }}" 
                                     class="relative w-16 h-20 object-cover rounded-lg 
                                            shadow-lg transform group-hover:scale-110 
                                            transition duration-300">
                            </div>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            {{ $book->judul }}
                        </td>

                        <td class="px-6 py-4 text-blue-700 max-w-xs truncate">
                            {{ $book->sinopsis }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $book->tahun_terbit }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $book->genre->name_genre }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $book->author->name_author }}
                        </td>

                        <td class="px-6 py-4 text-center space-x-3">

                            <a href="{{ route('books.edit', $book->id)}}" 
                               class="px-3 py-1 text-sm rounded-lg bg-blue-500/20 text-blue-600 
                                      hover:bg-blue-500 hover:text-white 
                                      transition duration-300">
                                Edit
                            </a>

                            <a href="{{ route('books.detail', $book->id) }}" 
                               class="px-3 py-1 text-sm rounded-lg bg-green-500/20 text-green-600 
                                      hover:bg-green-500 hover:text-white 
                                      transition duration-300">
                                Detail
                            </a>

                            <a href="#" 
                               class="px-3 py-1 text-sm rounded-lg bg-red-500/20 text-red-600 
                                      hover:bg-red-500 hover:text-white 
                                      transition duration-300">
                                Delete
                            </a>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection