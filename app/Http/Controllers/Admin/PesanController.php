<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesan::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        $pesans = $query->latest()
                        ->paginate(10)
                        ->withQueryString();

        return view('admin.pesan.index', compact('pesans'));
    }

    public function show(Pesan $pesan)
    {
        $pesan->update([
            'status' => 'dibaca'
        ]);

        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()
            ->route('admin.pesan.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }

    public function balas(Request $request, Pesan $pesan)
    {
        $request->validate([
            'balasan' => 'required'
        ]);

        $pesan->update([
            'balasan' => $request->balasan,
            'status' => 'dibaca'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Balasan berhasil dikirim.');
    }
}