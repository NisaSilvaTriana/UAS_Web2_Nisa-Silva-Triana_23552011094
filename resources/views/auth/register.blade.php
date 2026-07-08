<x-guest-layout>
    <div class="flex w-full max-w-4xl bg-white shadow-lg rounded-3xl overflow-hidden min-h-[500px]">
        
       
        <div class="hidden md:flex md:w-1/2 bg-blue-600 items-center justify-center p-8">
            <div class="text-white text-center">
                <h3 class="text-2xl font-bold mb-2">SDN Kulinyar</h3>
                <p class="text-blue-100 text-sm">Media Informasi & Publikasi Resmi</p>
            </div>
        </div>

        
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Daftar Akun</h2>
                <p class="text-gray-500 text-xs mt-1">Buat akun baru </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="text" name="name" :value="old('name')" required autofocus placeholder="Masukkan nama" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required placeholder="Masukkan email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required placeholder="Masukkan password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password_confirmation" required placeholder="Ulangi password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-gray-500 hover:text-gray-800 font-medium" href="{{ route('login') }}">
                        Sudah punya akun? Login
                    </a>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
