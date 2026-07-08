@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Kelola Galeri</h3>
            <small class="text-muted">
                Manajemen foto galeri website sekolah
            </small>
        </div>

        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Foto
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Search --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form method="GET" action="{{ route('admin.galeri.index') }}">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari keterangan galeri..."
                        value="{{ request('search') }}">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>

                </div>

            </form>

        </div>
    </div>

    {{-- Galeri --}}
    <div class="row">

        @forelse($galeris as $galeri)

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                <div class="card shadow-sm h-100">

                    @if($galeri->foto)

                        <img
                            src="{{ asset('storage/galeri/'.$galeri->foto) }}"
                            class="card-img-top"
                            style="height:180px; object-fit:cover;">

                    @else

                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height:180px;">

                            <span class="text-muted">
                                Tidak ada foto
                            </span>

                        </div>

                    @endif

                    <div class="card-body">

                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}
                        </small>

                        <p class="mt-2 mb-0">
                            {{ Str::limit($galeri->keterangan, 70) }}
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0 d-flex justify-content-between">

                        <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>

                        <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus foto ini?')">

                                <i class="bi bi-trash"></i>
                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-light text-center">

                    Tidak ada data galeri yang ditemukan.

                </div>

            </div>

        @endforelse

    </div>

    {{-- Pagination --}}
    @if($galeris->count())

        <div class="d-flex justify-content-between align-items-center mt-3">

            <small class="text-muted">
                Menampilkan
                {{ $galeris->firstItem() }}
                -
                {{ $galeris->lastItem() }}
                dari
                {{ $galeris->total() }}
                data
            </small>

            {{ $galeris->links() }}

        </div>

    @endif

</div>

@endsection