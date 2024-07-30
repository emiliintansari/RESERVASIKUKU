<?php

namespace App\Http\Controllers;
use App\Models\Team;


use Illuminate\Http\Request;

class TeamController extends Controller
{
   
    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_team' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $team = new Team();
        $team->nama_team = $request->nama_team;
        $team->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $team->gambar = $fileName;
        }

        $team->save();

        return redirect()->route('teams.create')->with('success', 'Team berhasil ditambahkan!');
    }

    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_team' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $team = Team::findOrFail($id);
        $team->nama_team = $request->nama_team;
        $team->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $team->gambar = $fileName;
        }

        $team->save();

        return redirect()->route('teams.index')->with('success', 'Team berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->gambar && file_exists(public_path('uploads/' . $team->gambar))) {
            unlink(public_path('uploads/' . $team->gambar));
        }
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team berhasil dihapus!');
    }

    

}
