@extends('layouts.admin')

@section('title','Edit Kontak')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-0">
                Edit Kontak
            </h3>

            <small class="text-muted">
                Perbarui informasi kontak sekolah
            </small>

        </div>

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

    <div class="card shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.kontak.update', $kontak->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control"
                        required>{{ old('alamat', $kontak->alamat) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $kontak->email) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        No Telepon Sekolah

                    </label>

                    <input
                        type="number"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon', $kontak->telepon) }}"
                        required>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Simpan Perubahan

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