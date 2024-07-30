<?php	
namespace App\Http\Controllers;

use App\Models\Boking;
use App\Models\Catalog;
use Illuminate\Http\Request;

class BokingController extends Controller
{
    public function index($id)
    {
        $catalogs = Catalog::find($id);
        
        if (!$catalogs) {
            return redirect()->back()->with('error', 'Catalog tidak ditemukan.');
        }
        

        return view('boking.index', compact('catalogs'));
    }

    public function pesan(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'nama' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'status' => 'required|string',
        ]);

        $catalog = Catalog::find($id);

        if (!$catalog) {
            return redirect()->back()->with('error', 'Catalog tidak ditemukan.');
        }

        $nama_catalog = $catalog->nama_catalog;
        $jumlah = $request->jumlah;
        $nama = $request->nama;
        $nomor_telepon = $request->nomor_telepon;
        $tanggal = $request->tanggal;
        $waktu = $request->waktu;
        $status	= $request->status;

        $data = [
            'nama_catalog' => $nama_catalog,
            'jumlah' => $jumlah,
            'nama' => $nama,
            'nomor_telepon' => $nomor_telepon,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'status' => $status,
        ];

        Boking::create($data);

        return redirect()->route('boking.index', ['id' => $id])->with('success', 'Pemesanan berhasil disimpan.');
    }
    
    public function tampil()
    {
        $bokings = Boking::all();
        $bokings = Boking::where('status', 'baru')->get();
        return view('boking.tampilan', compact('bokings'));
    }

    public function selesai()
    {
        $bokings = Boking::all();
        $bokings = Boking::where('status', 'selesai')->get();
        return view('boking.selesai', compact('bokings'));
    }


// BokingController.php

public function updateStatus($id)
{
    $boking = Boking::find($id);

    if (!$boking) {
        return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
    }

    $boking->status = 'selesai';
    $boking->save();

    return redirect()->route('boking.tampil')->with('success', 'Status pemesanan berhasil diperbarui.');
}

}
