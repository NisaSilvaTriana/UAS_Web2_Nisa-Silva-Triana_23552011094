@extends('layouts.public')

@section('content')

<!-- HERO -->
<section class="hero hero-page">

    <div class="overlay"></div>

    <div class="container hero-content">

        <h1>Agenda Sekolah</h1>

        <p>Jadwal kegiatan dan acara SDN Kulinyar</p>

    </div>

</section>

<!-- AGENDA -->
<div class="container py-5">

    <div class="content-box">

        @forelse($agendas as $agenda)

        <div class="card agenda-card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    <!-- Tanggal -->
                    <div class="col-md-2 text-center border-end">

                        <h2 class="fw-bold text-primary mb-0">
                            {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}
                        </h2>

                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($agenda->tanggal)->format('M Y') }}
                        </small>

                    </div>

                    <!-- Isi -->
                    <div class="col-md-10">

                        <h4 class="agenda-title">
                            {{ $agenda->nama_kegiatan }}
                        </h4>

                        <div class="mt-3">

                            <p class="mb-2">
                                <i class="bi bi-calendar-event text-primary"></i>
                                <strong>Tanggal :</strong>
                                {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d F Y') }}
                            </p>

                            <p class="mb-2">
                                <i class="bi bi-clock-fill text-success"></i>
                                <strong>Jam :</strong>
                                {{ $agenda->jam }}
                            </p>

                            <p class="mb-0">
                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                <strong>Lokasi :</strong>
                                {{ $agenda->lokasi }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="alert alert-info text-center">
            Belum ada agenda kegiatan.
        </div>

        @endforelse

        <div class="mt-4 d-flex justify-content-center">
            {{ $agendas->links() }}
        </div>

    </div>

</div>

@endsection