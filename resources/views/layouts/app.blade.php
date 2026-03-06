<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

@vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-blue-50">

<div class="flex min-h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-blue-100 text-blue-900 flex flex-col shadow-xl rounded-r-2xl">

  <!-- Logo -->
  <div class="px-6 py-6 border-b border-blue-200">
    <h1 class="text-2xl font-bold text-blue-600 flex items-center gap-2">
      📚 <span>E-Library</span>
    </h1>
    <p class="text-xs text-blue-500 mt-1">Library Management System</p>
  </div>

  <!-- Menu -->
  <nav class="flex-1 px-4 py-6 space-y-2 text-sm">

    <a href="/"
    class="flex items-center gap-3 px-4 py-2 rounded-lg text-blue-800 hover:bg-blue-200 hover:text-blue-700 transition">
    🏠 Home
    </a>

    <a href="/genre"
    class="flex items-center gap-3 px-4 py-2 rounded-lg text-blue-800 hover:bg-blue-200 hover:text-blue-700 transition">
    📂 Genre
    </a>

    <a href="{{ route('penulis.index') }}"
    class="flex items-center gap-3 px-4 py-2 rounded-lg text-blue-800 hover:bg-blue-200 hover:text-blue-700 transition">
    ✍️ Author
    </a>

    <a href="{{ route('books.index') }}"
    class="flex items-center gap-3 px-4 py-2 rounded-lg text-blue-800 hover:bg-blue-200 hover:text-blue-700 transition">
    📖 Books
    </a>

  </nav>

  <!-- Footer Sidebar -->
  <div class="px-6 py-4 border-t border-blue-200 text-xs text-blue-400">
    © {{ date('Y') }} E-Library
  </div>

</aside>

<!-- MAIN CONTENT -->
<div class="flex-1 flex flex-col">

  <!-- NAVBAR -->
  <nav class="bg-blue-100 shadow-sm px-6 py-4 flex justify-between items-center border-b border-blue-200">

    <div class="text-lg font-semibold text-blue-800">
      Dashboard
    </div>

    <div class="flex items-center gap-4">

      <div class="text-sm text-blue-700">
        Hello,
        <span class="font-semibold text-blue-600">
          {{ Auth::user()->name }}
        </span>
      </div>

      <a href="{{ route('action.logout') }}"
      class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">
      Logout
      </a>

    </div>

  </nav>

  <!-- PAGE CONTENT -->
  <main class="p-6">
    @yield('content')
  </main>

</div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
icon: 'success',
title: 'Success',
text: "{{ session('success') }}",
confirmButtonColor: '#6366f1'
});
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
icon: 'error',
title: 'Error',
text: "{{ session('error') }}",
confirmButtonColor: '#ef4444'
});
});
</script>
@endif

</body>
</html>