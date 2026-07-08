@extends('layouts.admin')

@section('content')

<h3>Edit Berita</h3>

<form action="{{ route('admin.berita.update',$berita->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
    <label>Judul</label>
    <input type="text"
           name="judul"
           class="form-control"
           value="{{ $berita->judul }}">
</div>

<div class="mb-3">
    <label>Isi</label>
    <textarea
        name="isi"
        rows="6"
        class="form-control">{{ $berita->isi }}</textarea>
</div>

<div class="mb-3">
    <label>Penulis</label>
    <input type="text"
           class="form-control"
           value="{{ $berita->penulis }}"
           disabled>
</div>

<div class="mb-3">
    <label>Status</label>

    <select name="status" class="form-control">

        <option value="Publish"
            {{ $berita->status=='Publish'?'selected':'' }}>
            Publish
        </option>

        <option value="Draft"
            {{ $berita->status=='Draft'?'selected':'' }}>
            Draft
        </option>

    </select>

</div>

<div class="mb-3">

    <label>Foto Saat Ini</label><br>

    @if($berita->gambar)

        <img src="{{ asset('storage/'.$berita->gambar) }}"
             width="200"
             class="img-thumbnail mb-2">

    @endif

</div>

<div class="mb-3">

    <label>Ganti Foto</label>

    <input type="file"
           name="gambar"
           class="form-control">

</div>

<button class="btn btn-primary">
    Update
</button>

<a href="{{ route('admin.berita.index') }}"
   class="btn btn-secondary">

Kembali

</a>

</form>

@endsection