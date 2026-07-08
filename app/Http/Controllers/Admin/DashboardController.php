<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Pesan;
use App\Models\Profil;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'totalBerita' => Berita::count(),

            'totalGaleri' => Galeri::count(),

            'totalPengumuman' => Pengumuman::count(),

            'totalAgenda' => Agenda::count(),

            'totalPesan' => Pesan::count(),

            'totalProfil' => Profil::count(),

            'beritaTerbaru' => Berita::latest()
                ->take(5)
                ->get(),

        ]);
    }
}