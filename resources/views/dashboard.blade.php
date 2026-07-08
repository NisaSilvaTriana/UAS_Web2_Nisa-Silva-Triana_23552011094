<x-app-layout>

<div class="container py-4">

    <!-- HEADER -->
    <h2 class="fw-bold text-primary">
        Dashboard Admin
    </h2>

    <p class="text-muted">
        Selamat Datang di Sistem Informasi Publikasi SDN Kulinyar
    </p>

    <!-- STATISTIK CARD -->
    <div class="row g-4 mt-2">

        <div class="col-md-3">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Berita</h6>
                    <h2>{{ $totalBerita }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h6>Galeri</h6>
                    <h2>{{ $totalGaleri }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-warning text-white">
                <div class="card-body text-center">
                    <h6>Pengumuman</h6>
                    <h2>{{ $totalPengumuman }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-danger text-white">
                <div class="card-body text-center">
                    <h6>Agenda</h6>
                    <h2>{{ $totalAgenda }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-info text-white">
                <div class="card-body text-center">
                    <h6>Pesan</h6>
                    <h2>{{ $totalPesan }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 bg-secondary text-white">
                <div class="card-body text-center">
                    <h6>Profil</h6>
                    <h2>{{ $totalProfil }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="row g-4 mt-4">

        <!-- BERITA TERBARU -->
        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header fw-bold">
                    Berita Terbaru
                </div>

                <div class="table-responsive">

                    <table class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($beritaTerbaru as $berita)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->created_at->format('d M Y') }}</td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada berita</td>
                            </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- MENU CEPAT -->
        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header fw-bold">
                    Menu Cepat
                </div>

                <div class="card-body">

                    <a href="{{ route('admin.berita.index') }}" class="btn btn-primary mb-2 w-100">
                        Kelola Berita
                    </a>

                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-success mb-2 w-100">
                        Kelola Galeri
                    </a>

                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-warning mb-2 w-100">
                        Kelola Pengumuman
                    </a>

                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-danger mb-2 w-100">
                        Kelola Agenda
                    </a>

                    <a href="{{ route('admin.pesan.index') }}" class="btn btn-info w-100">
                        Kelola Pesan
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>