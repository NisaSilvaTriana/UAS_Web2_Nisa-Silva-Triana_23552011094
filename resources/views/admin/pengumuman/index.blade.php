@extends('layouts.admin')

@section('title', 'Kelola Pengumuman')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-0">Kelola Pengumuman</h3>
            <small class="text-muted">
                Manajemen data pengumuman sekolah
            </small>
        </div>

        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Pengumuman
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

            <form method="GET">
                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari pengumuman..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">
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
                        <th>Judul</th>
                        <th width="150">Tanggal</th>
                        <th width="120">Status</th>
                        <th width="170">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($pengumumans as $pengumuman)

                        <tr>

                            <td class="text-center">
                                {{ $pengumumans->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong>{{ $pengumuman->judul }}</strong>
                            </td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}
                            </td>

                            <td class="text-center">

                                @if($pengumuman->status == 'Publish')
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

                                <a href="{{ route('admin.pengumuman.edit',$pengumuman->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.pengumuman.destroy',$pengumuman->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman?')">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">
                                <span class="text-muted">
                                    Belum ada data pengumuman.
                                </span>
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $pengumumans->links() }}

        </div>

    </div>

</div>

@endsection