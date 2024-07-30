<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\Boking_detail;
use App\Models\Boking;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class StatuspesananController extends Controller
{
    public function index()
    {
        $bokings = Boking::where('status', 'Baru')->get();

        return view('boking.index', compact('bokings'));
    }

    public function list()
    {
        return view('pesanan.index');
    }

    public function dikonfirmasi_list()
    {
        return view('pesanan.dikonfirmasi');
    }

    public function selesai_list()
    {
        return view('pesanan.selesai');
    }

    public function ubah_status(Request $request, boking $boking)
    {
        $boking->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $boking
        ]);
    }

    public function baru()
    {
        $bokings = Boking::where('status', 'Baru')->get();

        return response()->json([
            'data' => $bokings
        ]);
    }

    public function dikonfirmasi()
    {
        $bokings = Boking::where('status', 'Dikonfirmasi')->get();

        return response()->json([
            'data' => $bokings
        ]);
    }

    public function selesai()
    {
        $bokings = Boking::where('status', 'Selesai')->get();

        return response()->json([
            'data' => $bokings
        ]);
    }

}
