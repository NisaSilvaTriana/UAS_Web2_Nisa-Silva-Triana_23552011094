@extends('layouts.public')

@section('content')
<!-- ================= HERO ================= -->
<section class="hero hero-home"
style="background: linear-gradient(rgba(67,56,202,.45),rgba(67,56,202,.45)), url({{ asset('images/sekolah.jpg') }}) center/cover no-repeat;">
    <div class="container hero-content">
        <h1>
            Selamat Datang di<br>
            Sistem Informasi Publikasi
        </h1>
        <p>SDN Kulinyar</p>
    </div>
</section>

<!-- ================= PENGUMUMAN & BERITA ================= -->
<div class="container mt-5">
    <div class="row">

        <!-- PENGUMUMAN -->
        <div class="col-lg-6">
            <div class="content-box">
                <h3 class="judul-section">Pengumuman Terbaru</h3>
                <table class="table table-borderless align-middle">
                    <tbody>
                    @forelse($pengumuman as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="#" class="text-decoration-none">
                                Baca Selengkapnya
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada pengumuman.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- BERITA -->
        <div class="col-lg-6">
            <div class="content-box">
                <h3 class="judul-section">Berita Terbaru</h3>
                @forelse($berita as $item)
                <div class="news-card">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                    @endif

                    <div class="news-body">
                        <h5>{{ $item->judul }}</h5>
                        <small>{{ $item->created_at->format('d F Y') }}</small>
                        <p>{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                        <a href="{{ route('berita') }}" class="btn btn-sm btn-primary mt-3">Baca Selengkapnya</a>
                    </div>
                </div>
                @empty
                    <p>Belum ada berita.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- ================= GALERI ================= -->
<div class="container gallery mt-5 mb-5">
    <div class="content-box">
        <h3 class="judul-section">Galeri Terbaru</h3>
        <div class="row g-3">
            @forelse($galeri as $item)
            <div class="col-md-3 col-6">
                <img src="{{ asset('storage/galeri/'.$item->foto) }}" class="img-fluid gallery-img" alt="{{ $item->keterangan ?? 'Galeri' }}">
            </div>
            @empty
            <p class="text-center">Belum ada galeri.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection