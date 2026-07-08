<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Menampilkan profil sekolah.
     */
    public function index()
    {
        $profil = Profil::first();

        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Form tambah profil (hanya jika belum ada data).
     */
    public function create()
    {
        if (Profil::count() > 0) {
            return redirect()->route('admin.profil.index');
        }

        return view('admin.profil.create');
    }

    /**
     * Menyimpan profil baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Profil::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat'        => $request->alamat,
            'visi'          => $request->visi,
            'misi'          => $request->misi,
        ]);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    /**
     * Form edit profil.
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update profil.
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $profil->update([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat'        => $request->alamat,
            'visi'          => $request->visi,
            'misi'          => $request->misi,
        ]);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}