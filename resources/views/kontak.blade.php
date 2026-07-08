@extends('layouts.public')

@section('content')

<section class="hero hero-page">

    <div class="overlay"></div>

    <div class="container hero-content">

        <h1>Kontak Kami</h1>

        <p>Hubungi SDN Kulinyar</p>

    </div>

</section>

<div class="container py-5">

    <div class="content-box">

        @if($kontak)

        <div class="mb-4">

            <h5 class="kontak-title">
                <i class="bi bi-geo-alt-fill"></i>
                Alamat
            </h5>

            <p>{{ $kontak->alamat }}</p>

        </div>

        <div class="mb-4">

            <h5 class="kontak-title">
                <i class="bi bi-envelope-fill"></i>
                Email
            </h5>

            <p>{{ $kontak->email }}</p>

        </div>

        <div>

            <h5 class="kontak-title">
                <i class="bi bi-telephone-fill"></i>
                No. Telepon Sekolah
            </h5>

            <p>{{ $kontak->telepon }}</p>

        </div>

        @else

        <div class="alert alert-info text-center">

            Data kontak belum tersedia.

        </div>

        @endif

    </div>

</div>

@endsection