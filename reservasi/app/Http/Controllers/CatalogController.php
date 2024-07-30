<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use App\Models\Team;


use Illuminate\Http\Request;

class CatalogController extends Controller
{
        public function create()
        {
            $teams = Team::all();
            return view('catalogs.create', compact('teams'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'id_team' => 'required|integer',
                'nama_catalog' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'harga' => 'required|integer',
                'gambar' => 'nullable|image|max:2048'
            ]);
    
            $catalog = new Catalog();
            $catalog->id_team = $request->id_team;
            $catalog->nama_catalog = $request->nama_catalog;
            $catalog->deskripsi = $request->deskripsi;
            $catalog->harga = $request->harga;
    
            if ($request->hasFile('gambar')) {
                $fileName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads'), $fileName);
                $catalog->gambar = $fileName;
            }
    
            $catalog->save();
    
            return redirect()->route('catalogs.create')->with('success', 'Catalog berhasil ditambahkan!');
        }
    
        public function index()
        {
            $catalogs = Catalog::all();
            return view('catalogs.index', compact('catalogs'));
        }
    
        public function edit($id)
        {
            $catalog = Catalog::findOrFail($id);
            $teams = Team::all();
            return view('catalogs.edit', compact('catalog', 'teams'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'id_team' => 'required|integer',
                'nama_catalog' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'harga' => 'required|integer',
                'gambar' => 'nullable|image|max:2048'
            ]);
    
            $catalog = Catalog::findOrFail($id);
            $catalog->id_team = $request->id_team;
            $catalog->nama_catalog = $request->nama_catalog;
            $catalog->deskripsi = $request->deskripsi;
            $catalog->harga = $request->harga;
    
            if ($request->hasFile('gambar')) {
                $fileName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('uploads'), $fileName);
                $catalog->gambar = $fileName;
            }
    
            $catalog->save();
    
            return redirect()->route('catalogs.index')->with('success', 'Catalog berhasil diperbarui!');
        }
    
        public function destroy($id)
        {
            $catalog = Catalog::findOrFail($id);
            if ($catalog->gambar && file_exists(public_path('uploads/' . $catalog->gambar))) {
                unlink(public_path('uploads/' . $catalog->gambar));
            }
            $catalog->delete();
    
            return redirect()->route('catalogs.index')->with('success', 'Catalog berhasil dihapus!');
        }
    
}
