<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita yang sudah dipublikasikan.
     */
    public function index()
    {
        $beritas = Berita::where('status', 'Publish')
            ->latest()
            ->paginate(6);

        return view('berita', compact('beritas'));
    }
}