<nav class="navbar navbar-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <img src="{{ asset('images/icon-sekolah.png') }}" width="45" class="me-2">
            SDN Kulinyar
        </a>

        <ul class="navbar-nav d-flex flex-row ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Beranda</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profil') }}">Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('berita') }}">Berita</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengumuman') }}">Pengumuman</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pesan.form') }}">Pesan</a>
            </li>

        </ul>

    </div>

</nav>