@extends('layouts.admin')

@section('title','Kelola Agenda')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h3 class="fw-bold mb-0">Kelola Agenda</h3>

<small class="text-muted">
Manajemen agenda kegiatan sekolah
</small>

</div>

<a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">

<i class="bi bi-plus-circle"></i>

Tambah Agenda

</a>

</div>

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

{{ session('success') }}

<button class="btn-close" data-bs-dismiss="alert"></button>

</div>

@endif

<div class="card shadow-sm mb-3">

<div class="card-body">

<form method="GET">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Cari agenda..."
value="{{ request('search') }}">

<button class="btn btn-primary">

<i class="bi bi-search"></i>

</button>

</div>

</form>

</div>

</div>

<div class="card shadow-sm">

<div class="card-body">

<table class="table table-bordered table-hover align-middle">

<thead class="table-light text-center">

<tr>

<th>No</th>

<th>Nama Kegiatan</th>

<th>Tanggal</th>

<th>Jam</th>

<th>Lokasi</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($agendas as $agenda)

<tr>

<td class="text-center">
{{ $agendas->firstItem()+$loop->index }}
</td>

<td>{{ $agenda->nama_kegiatan }}</td>

<td class="text-center">
{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}
</td>

<td class="text-center">
{{ \Carbon\Carbon::parse($agenda->jam)->format('H:i') }}
</td>

<td>{{ $agenda->lokasi }}</td>

<td class="text-center">

<a href="{{ route('admin.agenda.edit',$agenda->id) }}"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

Edit

</a>

<form
action="{{ route('admin.agenda.destroy',$agenda->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus agenda?')">

<i class="bi bi-trash"></i>

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center py-4">

Belum ada agenda.

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $agendas->links() }}

</div>

</div>

</div>

@endsection