<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
  public function index(Request $request)
{
    $query = Galeri::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('keterangan', 'like', "%{$search}%")
              ->orWhere('tanggal', 'like', "%{$search}%");
        });
    }

    $galeris = $query->latest()
                     ->paginate(8)
                     ->withQueryString();

    return view('admin.galeri.index', compact('galeris'));
}

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('galeri', $namaFile, 'public');

        }

        Galeri::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'foto' => $namaFile,
        ]);

        return redirect()->route('admin.galeri.index')
                         ->with('success','Foto berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('galeri', $namaFile, 'public');

            $galeri->foto = $namaFile;
        }

        $galeri->tanggal = $request->tanggal;
        $galeri->keterangan = $request->keterangan;

        $galeri->save();

        return redirect()->route('admin.galeri.index')
                         ->with('success','Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
                         ->with('success','Foto berhasil dihapus.');
    }
}