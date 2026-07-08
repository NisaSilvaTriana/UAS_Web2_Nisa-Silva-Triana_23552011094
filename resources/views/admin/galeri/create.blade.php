@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-0">Tambah Foto Galeri</h3>
        <small class="text-muted">Tambahkan foto kegiatan sekolah ke galeri website</small>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.galeri.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        class="form-control"
                        placeholder="Masukkan keterangan foto..."
                        required>{{ old('keterangan') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto</label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan
                </button>

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection