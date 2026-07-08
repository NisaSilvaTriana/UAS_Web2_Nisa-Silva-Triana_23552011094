<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest('tanggal')->paginate(8);

        return view('galeri', compact('galeris'));
    }
}