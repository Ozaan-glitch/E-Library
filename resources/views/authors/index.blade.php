@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            📚 Daftar Authors
        </h1>

        <a href="{{ route('penulis.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium transition">
            + Add Author
        </a>
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 font-semibold">No</th>
                    <th class="px-6 py-3 font-semibold">Author Name</th>
                    <th class="px-6 py-3 font-semibold">Age</th>
                    <th class="px-6 py-3 font-semibold">Address</th>
                    <th class="px-6 py-3 font-semibold text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($authors as $index => $author)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $author->name_author }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $author->age }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $author->alamat }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-3">

                            <a href="{{ route('penulis.show', $author->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium">
                                Detail
                            </a>

                            <a href="{{ route('penulis.edit', $author->id) }}"
                               class="text-yellow-500 hover:text-yellow-700 font-medium">
                                Edit
                            </a>

                            <form action="{{ route('penulis.destroy', $author->id) }}"
                                  method="POST"
                                  class="form-delete">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


<script>
document.querySelectorAll('.form-delete').forEach(function(form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data author akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});
</script>

@endsection