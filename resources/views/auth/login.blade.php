<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Library Login</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <!-- Card -->
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">

        <!-- Logo & Title -->
        <div class="text-center mb-6">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" class="mx-auto h-12 w-auto">
            <h2 class="mt-4 text-2xl font-bold text-gray-800">Sign in to your account</h2>
            <p class="text-gray-500 text-sm mt-1">Login to access your E-Library dashboard</p>
        </div>

        <!-- Alerts -->
        @if (session('error'))
        <script>
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: "{{ session('error') }}",
                confirmButtonColor: '#6366f1'
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
                confirmButtonColor: '#6366f1'
            });
        });
        </script>
        @endif

        <!-- Login Form -->
        <form action="{{ route('action.login') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required placeholder="Enter your email"
                    class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            </div>

            <!-- Password -->
            <div>
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-sm text-indigo-500 hover:text-indigo-400">Forgot password?</a>
                </div>
                <input type="password" name="password" required placeholder="Enter your password"
                    class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold shadow-md transition">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <hr class="flex-1 border-gray-300">
            <span class="px-3 text-gray-400 text-sm">or</span>
            <hr class="flex-1 border-gray-300">
        </div>

        <!-- Social Login -->
        <div class="flex flex-col gap-3">
            <button class="w-full py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                Continue with Google
            </button>

            <button class="w-full py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                Continue with Facebook
            </button>
        </div>

        <!-- REGISTER LINK -->
        <p class="text-center text-gray-500 text-sm mt-6">
            Belum punya akun?
            <a href="{{ route('action.register') }}" class="text-indigo-600 font-semibold hover:underline">
                Register sekarang
            </a>
        </p>

    </div>

</div>

</body>
</html>