@vite(['resources/css/app.css','resources/js/app.js'])

<nav class="bg-white shadow-md border-b border-gray-200">
  <div class="mx-auto max-w-7xl px-4 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      <!-- Logo -->
      <div class="flex items-center gap-3">
        <div class="bg-indigo-400 p-2 rounded-lg shadow">
          📚   
        </div>
        <span class="text-gray-800 font-semibold text-lg tracking-wide">
          E-Library
        </span>
      </div>

      <!-- Menu -->
      <div class="hidden md:flex items-center gap-6">

        <a href="/"
        class="text-gray-600 hover:text-indigo-600 transition font-medium">
        Dashboard
        </a>

        <a href="/genre"
        class="text-gray-600 hover:text-indigo-600 transition font-medium">
        Genre
        </a>

        <a href="{{ route('penulis.index') }}"
        class="text-gray-600 hover:text-indigo-600 transition font-medium">
        Author
        </a>

        <a href="{{ route('books.index') }}"
        class="text-gray-600 hover:text-indigo-600 transition font-medium">
        Books
        </a>

      </div>

      <!-- Right Side -->
      <div class="flex items-center gap-4">

        @guest
        <a href="{{ route('login') }}"
        class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-lg text-sm font-medium transition shadow-md">
        Login
        </a>
        @endguest

        @auth
        <span class="text-gray-600 text-sm">
          Hello,
          <span class="text-indigo-600 font-semibold">
            {{ Auth::user()->name }}
          </span>
        </span>

        <a href="{{ route('action.logout') }}"
        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow">
        Logout
        </a>
        @endauth

      </div>

    </div>
  </div>
</nav>