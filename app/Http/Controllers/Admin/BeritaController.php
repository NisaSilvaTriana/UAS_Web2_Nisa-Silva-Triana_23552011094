<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
public function index(Request $request)
{
    $query = Berita::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('isi', 'like', "%{$search}%")
              ->orWhere('penulis', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        });
    }

    $beritas = $query->latest()
                     ->paginate(10)
                     ->withQueryString();

    return view('admin.berita.index', compact('beritas'));
}

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'penulis'=>'required',
            'status'=>'required',
            'gambar'=>'nullable|image'
        ]);

        $gambar = null;

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')
                ->store('berita','public');
        }

        Berita::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$gambar,
            'penulis'=>$request->penulis,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.berita.index')
                ->with('success','Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
{
    return view('admin.berita.edit', compact('berita'));
}

  public function update(Request $request, Berita $berita)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'status' => 'required',
        'gambar' => 'nullable|image'
    ]);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->store('berita', 'public');
        $berita->gambar = $gambar;
    }

    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;
    $berita->status = $request->status;

    $berita->save();

    return redirect()->route('admin.berita.index')
            ->with('success','Berita berhasil diupdate');
}

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return back()->with('success','Berita berhasil dihapus.');
    }
}