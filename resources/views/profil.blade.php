@extends('layouts.public')

@section('content')

<!-- Hero -->
<section class="hero hero-page">
    <div class="overlay"></div>

    <div class="container hero-content">
        <div>
            <h1>Profil Sekolah</h1>
            <p>{{ $profil->nama_sekolah ?? 'SDN Kulinyar' }}</p>
        </div>
    </div>
</section>

<!-- Profil -->
<div class="container py-5">

    <div class="content-box">

        @if($profil)

            <h2 class="judul-section">
                {{ $profil->nama_sekolah }}
            </h2>

            <div class="mb-4">
                <h5 class="fw-bold text-primary">Alamat</h5>
                <p>{{ $profil->alamat }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-bold text-primary">Visi</h5>
                <p>{{ $profil->visi }}</p>
            </div>

            <div>
                <h5 class="fw-bold text-primary">Misi</h5>
                <p style="white-space: pre-line;">
                    {{ $profil->misi }}
                </p>
            </div>

        @else

            <div class="alert alert-warning">
                Data profil sekolah belum tersedia.
            </div>

        @endif

    </div>

</div>

@endsection