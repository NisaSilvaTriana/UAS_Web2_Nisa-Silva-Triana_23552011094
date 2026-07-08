<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    // HALAMAN FORM PENGUNJUNG
    public function create()
    {
        return view('pesan');
    }

    // SIMPAN PESAN
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);

        Pesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'status' => 'Baru'
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }
}