@extends('layouts.admin')

@section('title', 'Tambah Profil Sekolah')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-0">Tambah Profil Sekolah</h3>
        <small class="text-muted">Lengkapi informasi profil sekolah</small>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.profil.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text"
                           name="nama_sekolah"
                           class="form-control"
                           value="{{ old('nama_sekolah') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                              rows="3"
                              class="form-control"
                              required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Visi</label>
                    <textarea name="visi"
                              rows="4"
                              class="form-control"
                              required>{{ old('visi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Misi</label>
                    <textarea name="misi"
                              rows="6"
                              class="form-control"
                              required>{{ old('misi') }}</textarea>
                </div>

                <button class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan
                </button>

                <a href="{{ route('admin.profil.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection