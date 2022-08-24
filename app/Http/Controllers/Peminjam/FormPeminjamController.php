<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Peminjaman;
use App\Models\SaprasPinjam;
use App\Models\Sapras;
use Carbon\Carbon;

class FormPeminjamController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();
        return view('peminjam.formpinjam.index', compact('ruangan'));
    }

    public function pinjam(Request $request)
    {
        $data_peminjam = new Peminjaman();
        $data_peminjam->user_id = auth()->user()->id;
        $data_peminjam->ruangan_id = $request->ruangan_id;
        $data_peminjam->tanggal = $request->tanggal;
        $data_peminjam->status = "Sedang Dipinjam";
        $data_peminjam->save();
        
        $sapras_id = $request->input('sapras_id', []);
        $qty = $request->input('qty', []);
        $units = [];
        // foreach ($qty as $key => $value) {
        //     echo $key . '-' . $value;
        //     echo "<br>";
        // }
        foreach ($sapras_id as $index => $unit) 
        {
            $units[] = [
                'peminjaman_id' => $data_peminjam->id,
                'sapras_id' => $sapras_id[$index],
                'qty' => $qty[$index],
            ];

            $check = Sapras::where('id', $unit)->get();
            foreach ($check as $key) 
            {
                if ($qty[$index] >= $key->qty)
                {
                    $data_peminjam = Peminjaman::where('id', $data_peminjam->id)->delete();
                    notify()->warning("Peminjaman melebihi stok barang!","Gagal","topRight");
                    return redirect()->back();
                } 
                    else
                {
                    $sapras = Sapras::where('id', $unit)->first();
                    $sapras->qty = $sapras->qty - $qty[$index];
                    $sapras->update();
                }
            }
        }

        // dd($units);
        SaprasPinjam::insert($units);
        notify()->success("Berhasil melakukan peminjaman!","Success","topRight");
        return redirect()->back();
    }
}
