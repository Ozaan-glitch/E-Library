@extends('layouts.app')
@section('content')
    <h1>Welcome to Update Genre {{ $update->genre_name }}</h1>
    
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
<form class="max-w-md mx-auto" action="{{ route('genre.update', $update->id) }}" method="POST">
   @csrf
     @method('PUT')
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" value="{{ $update->genre_name}}"
       name="name_genre"class="block py-2.5 px-0 w-full text-sm text-headin g bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder="  " value="" required />
      <label for="name_genre" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10  
       peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">komedi</label>
  </div>
  <button type="submit" class="text-red-500 bg-brand box-border border border-transparent hover:bg-brand-strong
   focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Submit</button>
</form>

@endsection