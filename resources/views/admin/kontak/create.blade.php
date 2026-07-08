@extends('layouts.admin')

@section('title','Tambah Kontak')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Tambah Kontak
        </h3>

        <small class="text-muted">
            Tambahkan informasi kontak sekolah
        </small>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.kontak.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label for="alamat" class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        class="form-control"
                        rows="4"
                        required>{{ old('alamat') }}</textarea>

                </div>

                <div class="mb-3">

                    <label for="email" class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required>

                </div>

                <div class="mb-4">

                    <label for="telepon" class="form-label fw-semibold">
                        Telepon Sekolah
                    </label>

                    <input
                        type="number"
                        id="telepon"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon') }}"
                        placeholder="Contoh: 081234567890"
                        required>

                </div>

                <button type="submit" class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Simpan

                </button>

                <a href="{{ route('admin.kontak.index') }}"
                   class="btn btn-secondary">


                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection