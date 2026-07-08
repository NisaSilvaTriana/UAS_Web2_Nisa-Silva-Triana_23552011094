@extends('layouts.public')

@section('content')

<!-- HERO -->
<section class="hero hero-page">

    <div class="container hero-content">

        <h1>Galeri Sekolah</h1>

        <p>Dokumentasi Kegiatan SDN Kulinyar</p>

    </div>

</section>

<!-- GALERI -->
<div class="container py-5">

    <div class="content-box">

        <!-- JUDUL -->
        <div class="judul-wrapper mb-4">


        </div>

        <!-- GRID -->
        <div class="row g-4">

            @forelse($galeris as $galeri)

            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="card galeri-card border-0 shadow-sm h-100">

                    <!-- GAMBAR -->
                    @if($galeri->foto)
                        <img src="{{ asset('storage/galeri/'.$galeri->foto) }}" class="galeri-img">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="galeri-img">
                    @endif

                    <!-- ISI -->
                    <div class="card-body">

                        <small class="text-muted">
                            <i class="bi bi-calendar-event"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y') }}
                        </small>

                        <p class="galeri-text mt-2">
                            {{ \Illuminate\Support\Str::limit($galeri->keterangan, 80) }}
                        </p>

                        <!-- TOMBOL -->
                        <button class="btn btn-sm btn-primary w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#galeri{{ $galeri->id }}">
                            Baca Selengkapnya
                        </button>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="galeri{{ $galeri->id }}" tabindex="-1">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Detail Galeri</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            @if($galeri->foto)
                                <img src="{{ asset('storage/'.$galeri->foto) }}"
                                     class="img-fluid rounded mb-3">
                            @endif

                            <p>
                                {{ $galeri->keterangan }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada galeri yang dipublikasikan.
                </div>
            </div>

            @endforelse

        </div>


        <div class="mt-4 d-flex justify-content-center">
            {{ $galeris->links() }}
        </div>

    </div>

</div>

@endsection