<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Tampilkan data kontak
     */
    public function index()
    {
        $kontaks = Kontak::all();

        return view('admin.kontak.index', compact('kontaks'));
    }

    /**
     * Form tambah kontak
     */
    public function create()
    {
        if (Kontak::count() >= 1) {
            return redirect()
                ->route('admin.kontak.index')
                ->with('error', 'Data kontak sudah ada. Silakan edit data yang tersedia.');
        }

        return view('admin.kontak.create');
    }

    /**
     * Simpan kontak
     */
    public function store(Request $request)
    {
        // Mencegah lebih dari satu data kontak
        if (Kontak::count() >= 1) {
            return redirect()
                ->route('admin.kontak.index')
                ->with('error', 'Data kontak hanya boleh satu.');
        }

        $validated = $request->validate([
            'alamat'            => 'required|string',
            'email'             => 'required|email',
            'telepon'   => 'required|string|max:20',
        ]);

        Kontak::create($validated);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil ditambahkan.');
    }

    /**
     * Form edit kontak
     */
    public function edit(Kontak $kontak)
    {
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update kontak
     */
    public function update(Request $request, Kontak $kontak)
    {
        $validated = $request->validate([
            'alamat'            => 'required|string',
            'email'             => 'required|email',
            'telepon'   => 'required|string|max:20',
        ]);

        $kontak->update($validated);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil diperbarui.');
    }

    /**
     * Hapus kontak
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil dihapus.');
    }
}