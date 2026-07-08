@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-0">Kelola Berita</h3>
            <small class="text-muted">
                Manajemen data berita website sekolah
            </small>
        </div>

        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Berita
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
    <div class="card shadow-sm mb-3">

        <div class="card-body">

            <form method="GET" action="{{ route('admin.berita.index') }}">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari judul, penulis, atau isi berita..."
                        value="{{ request('search') }}">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>

                </div>

            </form>

        </div>

    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light text-center">

                    <tr>
                        <th width="60">No</th>
                        <th width="120">Foto</th>
                        <th>Judul</th>
                        <th width="150">Penulis</th>
                        <th width="120">Status</th>
                        <th width="170">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($beritas as $berita)

                        <tr>

                            <td class="text-center">
                                {{ $beritas->firstItem() + $loop->index }}
                            </td>

                            <td class="text-center">

                                @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/'.$berita->gambar) }}"
                                        width="90"
                                        height="70"
                                        class="img-thumbnail"
                                        style="object-fit:cover;">

                                @else

                                    <span class="text-muted">
                                        Tidak ada
                                    </span>

                                @endif

                            </td>

                            <td>
                                <strong>{{ $berita->judul }}</strong>
                            </td>

                            <td>
                                {{ $berita->penulis }}
                            </td>

                            <td class="text-center">

                                @if($berita->status == 'Publish')

                                    <span class="badge bg-success">
                                        Publish
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Draft
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.berita.destroy', $berita->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                <span class="text-muted">

                                    Belum ada data berita.

                                </span>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $beritas->links() }}

            </div>

        </div>

    </div>

</div>

@endsection