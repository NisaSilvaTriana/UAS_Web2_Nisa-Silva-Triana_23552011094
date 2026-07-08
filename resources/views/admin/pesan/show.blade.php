@extends('layouts.admin')

@section('title','Detail Pesan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Detail Pesan</h3>
            <small class="text-muted">Informasi lengkap pesan dari pengunjung</small>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- NAMA --}}
            <div class="mb-3">
                <label class="fw-semibold">Nama</label>
                <input type="text" class="form-control" value="{{ $pesan->nama }}" readonly>
            </div>

            {{-- EMAIL --}}
            <div class="mb-3">
                <label class="fw-semibold">Email</label>
                <input type="text" class="form-control" value="{{ $pesan->email }}" readonly>
            </div>

            {{-- PESAN --}}
            <div class="mb-3">
                <label class="fw-semibold">Isi Pesan</label>
                <textarea class="form-control" rows="6" readonly>{{ $pesan->pesan }}</textarea>
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label class="fw-semibold">Status</label>
                <input type="text" class="form-control" value="{{ $pesan->status }}" readonly>
            </div>

            {{-- BALASAN (JIKA ADA) --}}
            @if($pesan->balasan)
            <div class="alert alert-success">
                <strong>Balasan Admin:</strong><br>
                {{ $pesan->balasan }}
            </div>
            @endif

            {{-- FORM BALAS --}}
            <hr>

            <h5 class="mb-3">Balas Pesan</h5>

<form action="{{ route('admin.pesan.balas', $pesan->id) }}" method="POST">
    @csrf

    <textarea name="balasan" class="form-control" rows="4" required></textarea>

    <button type="submit" class="btn btn-primary mt-2">
        Kirim Balasan
    </button>
</form>

            {{-- BUTTON KEMBALI --}}
            <a href="{{ route('admin.pesan.index') }}"
                class="btn btn-secondary mt-3">

                Kembali

            </a>

        </div>
    </div>

</div>

@endsection