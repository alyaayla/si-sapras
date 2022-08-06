<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\SaprasPinjam;
use App\Models\Ruangan;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::latest()->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = Ruangan::all();
        return view('admin.peminjaman.create', compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data_peminjam = new Peminjaman();
        $data_peminjam->nama_peminjam = $request->nama_peminjam;
        $data_peminjam->ruangan_id = $request->ruangan_id;
        $data_peminjam->tanggal = $request->tanggal;
        $data_peminjam->status = "Sedang Dipinjam";
        $data_peminjam->save();


        $sapras_id = $request->input('sapras_id', []);
        $qty = $request->input('qty', []);


        foreach ($sapras_id as $index => $unit) 
        {
            $data_pemindam = new SaprasPinjam();
            $data_pemindam->peminjaman_id = $data_peminjam->id;
            $data_pemindam->sapras_id = $unit;
            $data_pemindam->qty = $qty[$index];
            $data_pemindam->save();   
        }

        return redirect()->route('peminjaman.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->delete();
 
        return redirect()->route('peminjaman.index')->with(['succes' => 'Data Berhasil Dihapus']);
    }
}
