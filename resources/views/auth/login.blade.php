<x-guest-layout>
    <div class="flex w-full max-w-4xl bg-white shadow-lg rounded-3xl overflow-hidden min-h-[500px]">
        
        <!-- Sisi Kiri: Ilustrasi Warna Biru -->
        <div class="hidden md:flex md:w-1/2 bg-blue-600 items-center justify-center p-8">
            <div class="text-white text-center">
                <h3 class="text-2xl font-bold mb-2">SDN Kulinyar</h3>
                <p class="text-blue-100 text-sm">Media Informasi & Publikasi Resmi</p>
            </div>
        </div>

        <!-- Sisi Kanan: Form Dashboard Login -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Dashboard Login</h2>
                <p class="text-gray-500 text-xs mt-1">Masukkan akun Anda</p>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-xl bg-green-100 border border-green-200 text-green-800 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Autentikasi -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Tombol Login -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 shadow-md">
                        Login
                    </button>
                </div>

                <div class="mt-4 text-center text-sm text-gray-500">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>