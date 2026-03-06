@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Welcome to Genres</h1>

    <!-- Tombol Add Genre -->
    <a href="{{ route('genre.create') }}" 
       class="inline-block py-3 px-6 mb-6 bg-blue-500 text-white rounded-full
       transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
       Add Genre
    </a>
     @if(session('success'))
         <script>
            Swal.fire({
  title: "Success",
  text: "{{ session('success') }}",
  icon: "success"
});
         </script>
     @endif
    <!-- Tabel -->
    <div class="overflow-x-auto bg-gray-100 shadow-md rounded-lg border border-gray-300">
        <table class="min-w-full text-left text-gray-700">
            <thead class="bg-gray-200 uppercase text-gray-600 text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Genre</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($genres as $item)
                <tr class="bg-white hover:bg-gray-50 transform transition duration-300 hover:scale-101 hover:shadow-sm">
                    <td class="px-6 py-4">{{ $no++ }}</td>
                    <td class="px-6 py-4">{{ $item->name_genre}}</td>
                    <td class="px-6 py-4 space-x-2">

                        <!-- Tombol Edit -->
                        <a href="{{ route('genre.edit', $item->id )}}" 
                           class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-xs
                           transform transition duration-300 hover:-translate-y-1 hover:shadow-md hover:bg-yellow-600">
                           Edit
                        </a> 

                        <!-- Tombol Delete -->
                        <form action="{{route('genre.destroy', $item->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus genre ini?')" 
                               class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs
                               transform transition duration-300 hover:-translate-y-1 hover:shadow-md hover:bg-red-600">
                               Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection