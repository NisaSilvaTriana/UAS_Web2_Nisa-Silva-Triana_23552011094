<footer class="footer mt-5">

    <div class="container">

        <div class="row">

            {{-- Tentang --}}
            <div class="col-md-4 mb-4">

                <h4>SDN Kulinyar</h4>

                <p>
                    Sistem Informasi Publikasi SDN Kulinyar sebagai media
                    informasi sekolah yang menyediakan berita, pengumuman,
                    agenda kegiatan, galeri, dan informasi profil sekolah.
                </p>

            </div>

            {{-- Menu --}}
            <div class="col-md-4 mb-4">

                <h4>Menu</h4>

                <ul class="footer-menu">

                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profil') }}">Profil</a></li>
                    <li><a href="{{ route('berita') }}">Berita</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                    <li><a href="{{ route('agenda') }}">Agenda</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>

                </ul>

            </div>

            {{-- Kontak --}}
            <div class="col-md-4 mb-4">

                <h4>Kontak</h4>

                @if(isset($kontakFooter) && $kontakFooter)

                    <p>
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        {{ $kontakFooter->alamat ?? 'Alamat belum diatur' }}
                    </p>

                    <p>
                        <i class="bi bi-envelope-fill me-2"></i>
                        {{ $kontakFooter->email ?? 'Email belum diatur' }}
                    </p>

                    <p>
                        <i class="bi bi-telephone-fill me-2"></i>
                        {{ $kontakFooter->telepon ?? 'Telepon belum diatur' }}
                    </p>

                @else

                    <p class="text-light">
                        <i class="bi bi-geo-alt-fill me-2"></i> Sumedang, Jawa Barat
                    </p>
                    <p class="text-light">
                        <i class="bi bi-envelope-fill me-2"></i> info@sdnkulinyar.sch.id
                    </p>

                @endif

            </div>

        </div>

        <hr>

        <div class="text-center">

            © {{ date('Y') }} SDN Kulinyar.

        </div>

    </div>

</footer>