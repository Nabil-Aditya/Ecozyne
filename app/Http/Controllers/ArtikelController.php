<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('admin.view-artikel', compact('artikels'));
    }

    // Menampilkan form tambah artikel
    public function create()
    {
        return view('admin.add-artikel'); // Pastikan file ini ada di resources/views/admin/add-artikel.blade.php
    }

    // Menyimpan artikel baru
    public function artikel(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:15360', // 15 MB (15360 KB)
            'isi' => 'required|string',
        ]);

        try {
            // Simpan gambar
            $imagePath = $request->file('foto')->store('artikel', 'public');

            // Simpan artikel ke database
            Artikel::create([
                'judul' => $request->judul,
                'foto' => $imagePath,
                'isi' => $request->isi,
            ]);

            return response()->json(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan artikel. ' . $e->getMessage()], 500);
        }
    }

    // Menampilkan artikel berdasarkan ID
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.show-artikel', compact('artikel')); // Pastikan view ini ada
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        //
    }
}
