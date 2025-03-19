@extends('layouts.app', [
    'title' => 'Login Desa Duwet',
    'active' => 'login',
    'page' => 'login',
])

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-2xl font-bold mt-3">Login Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
        </p>
    </div>
</section>

<!-- Login Form Section -->
<section class="max-w-md mx-auto px-4 mb-16">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Logo and Sign In Header -->
        <div class="text-center pt-6 pb-2">
            <div class="flex justify-center mb-2">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo Desa Duwet" class="h-16 w-auto">
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Sign In</h2>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 font-medium text-sm text-red-600">
                    <ul>
                        <li>Maaf, NIK atau password yang Anda masukkan tidak valid.</li>
                    </ul>
                </div>
            @endif
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="px-6 py-4 space-y-4">
            @csrf

            <!-- NIK Field -->
            <div>
                <label for="nik" class="block text-gray-700 font-medium mb-1">NIK<span class="text-red-500">*</span></label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2dba48] bg-[#EBF2FA] @error('nik') border-red-500 @enderror"
                    placeholder="Masukkan NIK" required autofocus>
                @error('nik')
                    <span class="text-red-500 text-sm">Masukkan NIK yang valid</span>
                @enderror
            </div>
 
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Password<span class="text-red-500">*</span></label>
                <div class="flex">
                    <input type="password" id="password" name="password"
                        class="flex-grow px-3 py-2 border border-r-0 border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#2dba48] bg-[#EBF2FA] @error('password') border-red-500 @enderror"
                        placeholder="Masukkan password" required>
                    <button type="button" onclick="togglePasswordVisibility()" 
                        class="px-2 bg-white border border-l-0 border-gray-300 rounded-r-md flex items-center focus:outline-none hover:bg-gray-50">
                        <svg id="passwordToggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm">Password tidak valid</span>
                @enderror
            </div>

            <!-- Remember me checkbox -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-[#2dba48] rounded">
                <label for="remember" class="ml-2 text-gray-700">Remember me</label>
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" class="w-full bg-[#2dba48] text-white py-2 px-4 rounded-md hover:bg-[#249c3b] transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-[#2dba48] focus:ring-offset-2">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</section>

<!-- JavaScript for password visibility toggle -->
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('passwordToggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
        } else {
            passwordInput.type = 'password';
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>
@endsection