@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Tambah Agenda</h3>

<form action="{{ route('admin.agenda.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Nama Kegiatan</label>

<input
type="text"
name="nama_kegiatan"
class="form-control"
value="{{ old('nama_kegiatan') }}">

</div>

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
value="{{ old('tanggal') }}">

</div>

<div class="mb-3">

<label>Jam</label>

<input
type="time"
name="jam"
class="form-control"
value="{{ old('jam') }}">

</div>

<div class="mb-3">

<label>Lokasi</label>

<input
type="text"
name="lokasi"
class="form-control"
value="{{ old('lokasi') }}">

</div>

<button class="btn btn-primary">

Simpan

</button>

<a href="{{ route('admin.agenda.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

@endsection