@extends('layouts.admin')

@section('content')

<h3>Edit Pengumuman</h3>

<form action="{{ route('admin.pengumuman.update',$pengumuman->id) }}"
      method="POST">

@csrf
@method('PUT')

<div class="mb-3">

    <label>Judul</label>

    <input
        type="text"
        name="judul"
        class="form-control"
        value="{{ $pengumuman->judul }}">

</div>

<div class="mb-3">

    <label>Isi Pengumuman</label>

    <textarea
        name="isi"
        rows="6"
        class="form-control">{{ $pengumuman->isi }}</textarea>

</div>

<div class="mb-3">

    <label>Tanggal</label>

    <input
        type="date"
        name="tanggal"
        class="form-control"
        value="{{ $pengumuman->tanggal }}">

</div>

<div class="mb-3">

    <label>Status</label>

    <select
        name="status"
        class="form-control">

        <option value="Publish"
            {{ $pengumuman->status=='Publish'?'selected':'' }}>
            Publish
        </option>

        <option value="Draft"
            {{ $pengumuman->status=='Draft'?'selected':'' }}>
            Draft
        </option>

    </select>

</div>

<button class="btn btn-primary">

    Update

</button>

<a href="{{ route('admin.pengumuman.index') }}"
   class="btn btn-secondary">

    Kembali

</a>

</form>

@endsection