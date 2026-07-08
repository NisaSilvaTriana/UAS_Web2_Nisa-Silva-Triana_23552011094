@extends('layouts.admin')

@section('title','Pesan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Pesan</h3>
            <small class="text-muted">
                Menampilkan pesan yang dikirim dari website pengunjung.
            </small>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Search --}}
    <div class="card shadow-sm mb-3">
        <div class="card-body">

            <form method="GET">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th width="140">Tanggal</th>
                        <th width="150">Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($pesans as $pesan)

                    <tr>

                        <td class="text-center">
                            {{ $pesans->firstItem() + $loop->index }}
                        </td>

                        <td>{{ $pesan->nama }}</td>

                        <td>{{ $pesan->email }}</td>

                        <td>
                            {{ Str::limit($pesan->pesan, 70) }}
                        </td>

                        <td class="text-center">
                            {{ $pesan->created_at->format('d M Y') }}
                        </td>

                        {{-- Status --}}
                        <td class="text-center">
                            @if($pesan->status == 'dibaca')
                                <span class="badge bg-success px-3 py-2">
                                    Dibaca
                                </span>
                            @else
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Belum Dibaca
                                </span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td class="text-center">
                            <a href="{{ route('admin.pesan.show', $pesan->id) }}"
                               class="btn btn-primary btn-sm">
                                <i class="bi bi-eye me-1"></i>
                                Detail
                            </a>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center py-4">
                            Belum ada pesan yang masuk.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">
                {{ $pesans->links() }}
            </div>

        </div>
    </div>

</div>

@endsection