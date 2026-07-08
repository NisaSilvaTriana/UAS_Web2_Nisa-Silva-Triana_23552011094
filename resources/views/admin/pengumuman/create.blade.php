@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Tambah Pengumuman</h3>

<form action="{{ route('admin.pengumuman.store') }}"
      method="POST">

@csrf

<div class="mb-3">

    <label>Judul</label>

    <input
        type="text"
        name="judul"
        class="form-control">

</div>

<div class="mb-3">

    <label>Isi Pengumuman</label>

    <textarea
        name="isi"
        rows="6"
        class="form-control"></textarea>

</div>

<div class="mb-3">

    <label>Tanggal</label>

    <input
        type="date"
        name="tanggal"
        class="form-control">

</div>

<div class="mb-3">

    <label>Status</label>

    <select name="status" class="form-control">

        <option value="Publish" {{ old('status') == 'Publish' ? 'selected' : '' }}>
            Publish
        </option>

        <option value="Draft" {{ old('status', 'Draft') == 'Draft' ? 'selected' : '' }}>
            Draft
        </option>

    </select>

</div>

<button class="btn btn-primary">

    Simpan

</button>

<a href="{{ route('admin.pengumuman.index') }}"
   class="btn btn-secondary">

    Kembali

</a>

</form>

@endsection