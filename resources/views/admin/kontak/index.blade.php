@extends('layouts.admin')

@section('title','Kelola Kontak')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-0">Kelola Kontak</h3>

            <small class="text-muted">
                Informasi kontak sekolah
            </small>

        </div>

        @if($kontaks->count() == 0)
            <a href="{{ route('admin.kontak.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                Tambah Kontak

            </a>
        @endif

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>

                        <th>Alamat</th>

                        <th>Email</th>

                        <th>No Telepon</th>

                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kontaks as $kontak)

                    <tr>

                        <td class="text-center">

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $kontak->alamat }}

                        </td>

                        <td>

                            {{ $kontak->email }}

                        </td>

                        <td>

                            {{ $kontak->no_telp_sekolah }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('admin.kontak.edit',$kontak->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                                Edit

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Belum ada data kontak.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection