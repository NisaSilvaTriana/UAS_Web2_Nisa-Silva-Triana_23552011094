@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-0">Profil Sekolah</h3>
            <small class="text-muted">
                Kelola informasi profil sekolah
            </small>
        </div>

        @if($profil)
            <a href="{{ route('admin.profil.edit', $profil->id) }}"
               class="btn btn-primary">
                <i class="bi bi-pencil-square"></i>
                Edit Profil
            </a>
        @endif

    </div>

    {{-- Alert --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- Isi Profil --}}
    @if($profil)

        <div class="card shadow-sm">

            <div class="card-body">

                <div class="mb-4">

                    <h5 class="fw-bold text-primary">
                        <i class="bi bi-building"></i>
                        Nama Sekolah
                    </h5>

                    <p class="mb-0">
                        {{ $profil->nama_sekolah }}
                    </p>

                </div>

                <hr>

                <div class="my-4">

                    <h5 class="fw-bold text-primary">
                        <i class="bi bi-geo-alt"></i>
                        Alamat
                    </h5>

                    <p class="mb-0">
                        {!! nl2br(e($profil->alamat)) !!}
                    </p>

                </div>

                <hr>

                <div class="my-4">

                    <h5 class="fw-bold text-primary">
                        <i class="bi bi-bullseye"></i>
                        Visi
                    </h5>

                    <p class="mb-0">
                        {!! nl2br(e($profil->visi)) !!}
                    </p>

                </div>

                <hr>

                <div class="mt-4">

                    <h5 class="fw-bold text-primary">
                        <i class="bi bi-list-check"></i>
                        Misi
                    </h5>

                    <p class="mb-0">
                        {!! nl2br(e($profil->misi)) !!}
                    </p>

                </div>

            </div>

        </div>

    @else

        <div class="card shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-building display-4 text-secondary"></i>

                <h5 class="mt-3">
                    Profil sekolah belum tersedia.
                </h5>

                <p class="text-muted">
                    Silakan tambahkan profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('admin.profil.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Profil

                </a>

            </div>

        </div>

    @endif

</div>

@endsection