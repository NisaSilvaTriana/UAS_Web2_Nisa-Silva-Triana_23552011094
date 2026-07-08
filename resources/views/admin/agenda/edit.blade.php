@extends('layouts.admin')

@section('content')

<h3>Edit Agenda</h3>

<form action="{{ route('admin.agenda.update',$agenda->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Nama Kegiatan</label>

<input
type="text"
name="nama_kegiatan"
class="form-control"
value="{{ $agenda->nama_kegiatan }}">

</div>

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
value="{{ $agenda->tanggal }}">

</div>

<div class="mb-3">

<label>Jam</label>

<input
type="time"
name="jam"
class="form-control"
value="{{ $agenda->jam }}">

</div>

<div class="mb-3">

<label>Lokasi</label>

<input
type="text"
name="lokasi"
class="form-control"
value="{{ $agenda->lokasi }}">

</div>

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('admin.agenda.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

@endsection