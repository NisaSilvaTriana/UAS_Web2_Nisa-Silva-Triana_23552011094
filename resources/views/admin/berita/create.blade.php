@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Tambah Berita</h3>

<form action="{{ route('admin.berita.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">
    <label>Judul</label>
    <input type="text"
           name="judul"
           class="form-control">
</div>

<div class="mb-3">
    <label>Isi Berita</label>

    <textarea
        name="isi"
        rows="6"
        class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Penulis</label>

    <input type="text"
           name="penulis"
           class="form-control">
</div>

<div class="mb-3">
    <label>Status</label>

    <select
        name="status"
        class="form-control">

        <option value="Publish">Publish</option>
        <option value="Draft">Draft</option>

    </select>

</div>

<div class="mb-3">
    <label>Gambar</label>

    <input
        type="file"
        name="gambar"
        class="form-control">

</div>

<button class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('admin.berita.index') }}"
   class="btn btn-secondary">

    Kembali

</a>

</form>

@endsection