<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $agendas = Agenda::when($request->search, function ($query) use ($request) {
                $query->where('nama_kegiatan', 'like', '%' . $request->search . '%')
                      ->orWhere('lokasi', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nama_kegiatan' => 'required',
        'tanggal' => 'required|date',
        'jam' => 'required',
        'lokasi' => 'required',
    ]);

    Agenda::create([
        'nama_kegiatan' => $request->nama_kegiatan,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'lokasi' => $request->lokasi,
    ]);

    return redirect()->route('admin.agenda.index')
        ->with('success', 'Agenda berhasil ditambahkan.');
}

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit',compact('agenda'));
    }

 public function update(Request $request, Agenda $agenda)
{
    $request->validate([
        'nama_kegiatan' => 'required',
        'tanggal' => 'required|date',
        'jam' => 'required',
        'lokasi' => 'required',
    ]);

    $agenda->update([
        'nama_kegiatan' => $request->nama_kegiatan,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'lokasi' => $request->lokasi,
    ]);

    return redirect()->route('admin.agenda.index')
        ->with('success', 'Agenda berhasil diperbarui.');
}

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with('success','Agenda berhasil dihapus.');
    }
}