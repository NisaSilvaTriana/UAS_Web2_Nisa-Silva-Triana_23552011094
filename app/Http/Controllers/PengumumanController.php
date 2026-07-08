<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::where('status', 'Publish')
            ->latest()
            ->paginate(5);

        return view('pengumuman', compact('pengumumans'));
    }
}