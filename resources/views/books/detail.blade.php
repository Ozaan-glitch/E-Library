@extends('layouts.app')

@section('content')

<style>
@keyframes fadeSlide {
    0% { opacity: 0; transform: translateY(40px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
    100% { transform: translateY(0px); }
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animate-fadeSlide {
    animation: fadeSlide 1s ease forwards;
}

.animate-floating {
    animation: floating 4s ease-in-out infinite;
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradientMove 6s ease infinite;
}
</style>

<div class="min-h-screen bg-white 
            flex items-center justify-center py-20 px-6 relative overflow-hidden">

    {{-- Background Glow Effect --}}
    <div class="absolute w-[600px] h-[600px] bg-cyan-200/20 blur-[150px] rounded-full top-[-100px] left-[-100px]"></div>
    <div class="absolute w-[500px] h-[500px] bg-blue-200/20 blur-[150px] rounded-full bottom-[-100px] right-[-100px]"></div>

    <div class="relative max-w-6xl w-full bg-white/50 backdrop-blur-2xl 
                rounded-3xl shadow-[0_0_60px_rgba(0,150,255,0.15)] 
                border border-blue-200/30 p-12 animate-fadeSlide">

        <div class="grid md:grid-cols-2 gap-16 items-center">

            {{-- IMAGE SECTION --}}
            <div class="relative flex justify-center group">

                {{-- Animated Blue Ring --}}
                <div class="absolute inset-0 rounded-[40px] p-[3px] 
                            bg-gradient-to-r from-cyan-400 via-blue-400 to-blue-500
                            animate-gradient blur-sm opacity-70 group-hover:opacity-100 
                            transition duration-500">
                </div>

                {{-- Frame --}}
                <div class="relative bg-white p-5 rounded-[40px] shadow-2xl 
                            animate-floating transition duration-500 
                            group-hover:scale-105">

                    <img src="{{ asset('storage/'.$detail->image) }}" 
                         alt="{{ $detail->judul }}"
                         class="rounded-[30px] w-96 h-[520px] object-cover shadow-[0_20px_60px_rgba(0,0,50,0.2)]">
                </div>

            </div>

            {{-- DETAIL SECTION --}}
            <div class="text-gray-800 space-y-8">

                <h1 class="text-5xl font-extrabold leading-tight 
                           bg-gradient-to-r from-cyan-400 via-blue-400 to-blue-500
                           bg-clip-text text-transparent animate-gradient">
                    {{ $detail->judul }}
                </h1>

                <p class="text-gray-700 text-lg leading-relaxed tracking-wide">
                    {{ $detail->sinopsis }}
                </p>

                <div class="grid grid-cols-2 gap-6 mt-8">

                    @php
                        $items = [
                            ['Tahun Terbit', $detail->tahun_terbit],
                            ['Genre', $detail->genre->name_genre],
                            ['Author', $detail->author->name_author],
                            ['Age Rating', $detail->age],
                        ];
                    @endphp

                    @foreach($items as $item)
                    <div class="relative bg-white/30 border border-blue-200/30 
                                rounded-2xl p-6 backdrop-blur-xl 
                                hover:bg-cyan-200/20 hover:border-cyan-400/40 
                                transition duration-500 group">

                        <p class="text-sm text-blue-400 mb-2 group-hover:text-cyan-500 transition">
                            {{ $item[0] }}
                        </p>
                        <p class="text-xl font-semibold">
                            {{ $item[1] }}
                        </p>
                    </div>
                    @endforeach

                </div>

                <div class="mt-6 bg-white/30 border border-blue-200/30 
                            rounded-2xl p-6 backdrop-blur-xl 
                            hover:bg-cyan-200/20 hover:border-cyan-400/40 
                            transition duration-500">

                    <p class="text-sm text-blue-400 mb-2">Alamat Penerbit</p>
                    <p class="text-lg font-semibold">{{ $detail->alamat }}</p>
                </div>

                {{-- Back Button --}}
                <div class="mt-10">
                    <a href="{{ route('books.index') }}"
                       class="px-8 py-4 rounded-full 
                              bg-gradient-to-r from-cyan-400 to-blue-500 
                              text-white font-bold text-lg 
                              shadow-lg hover:shadow-cyan-500/50 
                              hover:scale-105 transition duration-300">
                        ⬅ Back to Collection
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection