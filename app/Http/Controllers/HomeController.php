<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status','Publish')
            ->latest()
            ->take(3)
            ->get();

        $galeri = Galeri::latest()
            ->take(8)
            ->get();

        $pengumuman = Pengumuman::where('status','Publish')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome',[
            'berita'=>$berita,
            'galeri'=>$galeri,
            'pengumuman'=>$pengumuman,

            'totalBerita'=>Berita::count(),
            'totalAgenda'=>Agenda::count(),
            'totalGaleri'=>Galeri::count(),
            'totalPengumuman'=>Pengumuman::count(),
        ]);
    }
}