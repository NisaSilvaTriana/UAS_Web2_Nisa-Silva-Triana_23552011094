@extends('layouts.public')

@section('content')

<!-- HERO -->
<section class="hero hero-page">

    <div class="overlay"></div>

    <div class="container hero-content">

        <h1>Pengumuman</h1>

        <p>Informasi resmi SDN Kulinyar</p>

    </div>

</section>

<!-- PENGUMUMAN -->
<div class="container py-5">

    <div class="content-box">

        @forelse($pengumumans as $pengumuman)

        <div class="card pengumuman-card shadow-sm border-0 mb-4">

            <div class="card-body">

                <h5 class="pengumuman-title">
                    {{ $pengumuman->judul }}
                </h5>

                <small class="text-muted">
                    <i class="bi bi-calendar-event"></i>
                    {{ $pengumuman->created_at->format('d F Y') }}
                </small>

                <hr>

                <p>
                    {{ Str::limit(strip_tags($pengumuman->isi), 200) }}
                </p>

                <button
                    class="btn btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#pengumuman{{ $pengumuman->id }}">

                    Baca Selengkapnya

                </button>

            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="pengumuman{{ $pengumuman->id }}"
             tabindex="-1">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            {{ $pengumuman->judul }}
                        </h5>

                        <button class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        {!! nl2br(e($pengumuman->isi)) !!}

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="alert alert-info text-center">
            Belum ada pengumuman.
        </div>

        @endforelse

        <div class="mt-4 d-flex justify-content-center">
            {{ $pengumumans->links() }}
        </div>

    </div>

</div>

@endsection