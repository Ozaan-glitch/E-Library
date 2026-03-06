@vite(['resources/css/app.css','resources/js/app.js'])

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-6 py-12">

<div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-lg p-8">

<!-- Logo -->
<div class="text-center">
<img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
class="mx-auto h-10 w-auto">
<h2 class="mt-4 text-2xl font-semibold text-gray-800">Create Account</h2>
<p class="text-gray-500 text-sm mt-1">Register to access E-Library</p>
</div>

@if (session('error'))
<script>
document.addEventListener("DOMContentLoaded", function(){
Swal.fire({
icon: 'error',
title: 'Registration Failed',
text: "{{ session('error') }}",
confirmButtonColor: '#4f46e5'
});
});
</script>
@endif

@if ($errors->any())
<script>
document.addEventListener("DOMContentLoaded", function(){
Swal.fire({
icon: 'error',
title: 'Validation Error',
html: `{!! implode('<br>', $errors->all()) !!}`,
confirmButtonColor: '#4f46e5'
});
});
</script>
@endif

<form action="{{ route('action.register') }}" method="POST" class="mt-6 space-y-5">
@csrf

<!-- Username -->
<div>
<label class="block text-sm font-medium text-gray-700">Username</label>
<input type="text" name="username" required
class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
</div>

<!-- Email -->
<div>
<label class="block text-sm font-medium text-gray-700">Email</label>
<input type="email" name="email" required
class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
</div>

<!-- Password -->
<div>
<label class="block text-sm font-medium text-gray-700">Password</label>
<input type="password" name="password" required
class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
</div>

<!-- Button -->
<button type="submit"
class="w-full py-2.5 rounded-lg bg-gray-900 hover:bg-gray-800 text-white font-semibold transition shadow">
Register
</button>

</form>

<!-- Login -->
<p class="text-center text-gray-500 text-sm mt-6">
Sudah punya akun?
<a href="{{ route('login') }}" class="text-gray-900 font-semibold hover:underline">
Login
</a>
</p>

</div>
</div>