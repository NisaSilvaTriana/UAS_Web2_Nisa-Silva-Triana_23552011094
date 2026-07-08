<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo & Menu -->
            <div class="flex items-center space-x-8">

                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-blue-600">
                    Admin Panel
                </a>

                <div class="hidden md:flex items-center space-x-6">

                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('admin.berita.index')" :active="request()->routeIs('admin.berita.*')">
                        Berita
                    </x-nav-link>

                    <x-nav-link :href="route('admin.galeri.index')" :active="request()->routeIs('admin.galeri.*')">
                        Galeri
                    </x-nav-link>

                    <x-nav-link :href="route('admin.pengumuman.index')" :active="request()->routeIs('admin.pengumuman.*')">
                        Pengumuman
                    </x-nav-link>

                    <x-nav-link :href="route('admin.agenda.index')" :active="request()->routeIs('admin.agenda.*')">
                        Agenda
                    </x-nav-link>

                    <x-nav-link :href="route('admin.profil.index')" :active="request()->routeIs('admin.profil.*')">
                        Profil
                    </x-nav-link>

                    <x-nav-link :href="route('admin.kontak.index')" :active="request()->routeIs('admin.kontak.*')">
                        Kontak
                    </x-nav-link>

                    <x-nav-link :href="route('admin.pesan.index')" :active="request()->routeIs('admin.pesan.*')">
                        Pesan
                    </x-nav-link>

                </div>
            </div>

            <!-- User -->
            <div class="flex items-center space-x-4">

                <span class="text-gray-700">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md transition">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </div>

    <!-- Mobile -->
    <div class="md:hidden border-t">

        <div class="px-4 py-3 space-y-2">

            <x-responsive-nav-link :href="route('admin.dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.berita.index')">
                Berita
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.galeri.index')">
                Galeri
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.pengumuman.index')">
                Pengumuman
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.agenda.index')">
                Agenda
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.profil.index')">
                Profil
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.kontak.index')">
                Kontak
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.pesan.index')">
                Pesan
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full text-left px-3 py-2 text-red-600">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>