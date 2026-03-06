@extends('layouts.app')

@section('content')

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="max-w-xl mx-auto mt-10 bg-white shadow-xl rounded-xl p-8">

<h1 class="text-2xl font-bold mb-6 text-gray-800">
Edit Author : {{ $edit->name_author }}
</h1>

@if ($errors->any())
<script>
document.addEventListener("DOMContentLoaded", function(){
Swal.fire({
icon: 'error',
title: 'Validation Error',
html: `{!! implode('<br>', $errors->all()) !!}`,
confirmButtonColor: '#ef4444'
});
});
</script>
@endif

<form action="{{ route('penulis.update',$edit->id) }}" method="POST" class="space-y-5">
@csrf
@method('PUT')

<div>
<label class="block text-sm font-semibold text-gray-700 mb-1">
Name Author
</label>

<input type="text"
name="name_author"
value="{{ $edit->name_author }}"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-1">
Age Author
</label>

<input type="number"
name="age"
value="{{ $edit->age }}"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
</div>

<div>
<label class="block text-sm font-semibold text-gray-700 mb-1">
Alamat Author
</label>

<input type="text"
name="alamat"
value="{{ $edit->alamat }}"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
</div>

<div class="flex gap-3">

<button type="submit"
class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold shadow">
Update Author
</button>

<a href="{{ route('penulis.index') }}"
class="bg-gray-500 hover:bg-gray-400 text-white px-6 py-2 rounded-lg font-semibold shadow">
Cancel
</a>

</div>

</form>
</div>

@endsection