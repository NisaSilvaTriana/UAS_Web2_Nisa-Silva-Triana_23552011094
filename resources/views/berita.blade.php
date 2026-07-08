
@extends('layouts.public')

@section('content')

<style>
    body{
        background:#f5f7fb;
    }

    .card-berita{
        border:none;
        border-radius:18px;
        overflow:hidden;
        transition:.3s;
        box-shadow:0 10px 25px rgba(0,0,0,.08);
        height:100%;
    }

    .card-berita:hover{
        transform:translateY(-6px);
    }

    .card-berita img{
        width:100%;
        height:220px;
        object-fit:cover;
    }

    .card-body h5{
        font-weight:700;
        color:#4338ca;
    }

    .btn-primary{
        background:#4338ca;
        border:none;
    }

    .btn-primary:hover{
        background:#3428a8;
    }
</style>

<!-- Hero -->
<section class="hero hero-page">
    <div class="overlay"></div>

    <div class="container hero-content">
        <div>
            <h1>Berita Sekolah</h1>
            <p>Informasi terbaru mengenai kegiatan SDN Kulinyar</p>
        </div>
    </div>
</section>

<!-- LIST BERITA -->

<div class="container py-5">

<div class="row g-4">

@forelse($beritas as $berita)

<div class="col-md-6 col-lg-4">

<div class="card card-berita">

@if($berita->gambar)

<img src="{{ asset('storage/'.$berita->gambar) }}">

@else

<img src="https://via.placeholder.com/600x350?text=Berita">

@endif

<div class="card-body">

<h5>

{{ $berita->judul }}

</h5>

<div class="text-muted mb-2">

<i class="bi bi-person-fill"></i>

{{ $berita->penulis }}

<br>

<i class="bi bi-calendar-event"></i>

{{ $berita->created_at->format('d F Y') }}

</div>

<p>

{{ Str::limit(strip_tags($berita->isi),120) }}

</p>

<button
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#berita{{ $berita->id }}">

Baca Selengkapnya

</button>

</div>

</div>

</div>

<!-- MODAL -->

<div
class="modal fade"
id="berita{{ $berita->id }}"
tabindex="-1">

<div class="modal-dialog modal-lg">

<div class="modal-content">

<div class="modal-header">

<h5>

{{ $berita->judul }}

</h5>

<button
class="btn-close"
data-bs-dismiss="modal">

</button>

</div>

<div class="modal-body">

@if($berita->gambar)

<img
src="{{ asset('storage/'.$berita->gambar) }}"
class="img-fluid rounded mb-3">

@endif

<p>

{!! nl2br(e($berita->isi)) !!}

</p>

</div>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-info text-center">

Belum ada berita yang dipublikasikan.

</div>

</div>

@endforelse

</div>

<!-- PAGINATION -->

<div class="mt-5 d-flex justify-content-center">

{{ $beritas->links() }}

</div>

</div>


@endsection