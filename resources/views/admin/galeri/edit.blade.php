@extends('layouts.admin')

@section('content')

<h3>Edit Galeri</h3>

<form action="{{ route('admin.galeri.update', $galeri->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tanggal</label>

        <input
            type="date"
            name="tanggal"
            class="form-control"
            value="{{ $galeri->tanggal }}">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>

        <textarea
            name="keterangan"
            rows="5"
            class="form-control">{{ $galeri->keterangan }}</textarea>
    </div>

    <div class="mb-3">

        <label>Foto Saat Ini</label><br>

        @if($galeri->foto)

            <img
                src="{{ asset('storage/galeri/'.$galeri->foto) }}"
                width="200"
                class="img-thumbnail mb-2">

        @else

            <span class="text-muted">Belum ada foto.</span>

        @endif

    </div>

    <div class="mb-3">

        <label>Ganti Foto</label>

        <input
            type="file"
            name="foto"
            class="form-control"
            accept="image/*">

    </div>

    <button class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('admin.galeri.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

@endsection