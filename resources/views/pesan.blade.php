@extends('layouts.public')

@section('content')

<div class="container py-5">

<h2>Kirim Pesan</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('pesan.store') }}" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama" class="form-control mb-2">

    <input type="email" name="email" placeholder="Email" class="form-control mb-2">

    <textarea name="pesan" class="form-control mb-2" placeholder="Tulis pesan"></textarea>

    <button class="btn btn-primary">Kirim</button>
</form>

</div>

@endsection