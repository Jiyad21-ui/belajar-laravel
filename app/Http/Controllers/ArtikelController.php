<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    // 🟢 1. Tampilkan semua artikel
    public function index()
    {
        $artikels = Artikel::with('penulis')->latest()->get();
        return view('artikel.index', compact('artikels'));
    }

    // 🟢 2. Form tambah artikel
    public function create()
    {
        return view('artikel.create');
    }

    // 🟢 3. Simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'penulis_id' => Auth::id(),
        ]);

      return redirect()->route('dashboard')->with('success', 'Artikel berhasil ditambahkan!');

    }

    // 🟢 4. Form edit artikel
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    // 🟢 5. Update artikel
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        $artikel->update($request->all());

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // 🟢 6. Hapus artikel
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
