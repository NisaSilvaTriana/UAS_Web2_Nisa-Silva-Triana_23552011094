@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card card-dashboard purple">
            <div class="card-body text-center">
                <h6>Berita</h6>
                <h1>{{ $totalBerita }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard green">
            <div class="card-body text-center">
                <h6>Galeri</h6>
                <h1>{{ $totalGaleri }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard orange">
            <div class="card-body text-center">
                <h6>Pengumuman</h6>
                <h1>{{ $totalPengumuman }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard red">
            <div class="card-body text-center">
                <h6>Pesan</h6>
                <h1>{{ $totalPesan }}</h1>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">

    <div class="card-header">
        Berita Terbaru
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @forelse($beritaTerbaru as $item)

                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>

                @empty

                <tr>
                    <td colspan="2" class="text-center">
                        Belum ada berita
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection