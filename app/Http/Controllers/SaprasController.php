<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sapras;
use App\Models\Ruangan;
use Illuminate\Support\Facades\File;

class SaprasController extends Controller
{
    public function index()
    {
        
        $saprass = Sapras::latest()->get();
        return view('admin.sapras.index', compact('saprass'));
        
    }
    
    public function index_peminjam()
    {
        $saprass = Sapras::latest()->get();
        return view('admin.sapras.index', compact('saprass'));
        
    }

    public function create()
    {
        $ruangan = Ruangan::latest()->get();
        return view('admin.sapras.create', compact('ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required',
            'kode' => 'required',
            'namasapras' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'gambar' => 'required',

        ]);
    
        $sapras = new Sapras();
        $sapras->ruangan_id = $request->ruangan_id;
        $sapras->kode = $request->kode;
        $sapras->namasapras = $request->namasapras;
        $sapras->qty = $request->qty;
        $sapras->satuan = $request->satuan;
        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $sapras['gambar'] = "$profileImage";
        }
        $sapras->save();

        return redirect()->route('sapras.index')
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
    public function edit(Sapras $sapra)
    {
        $ruangan = Ruangan::latest()->get();
        return view('admin.sapras.edit',compact('sapra', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sapras $sapra)
    {
        $request->validate([
            'kode' => 'required',
            'namasapras' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
        ]);

        $sapras = Sapras::findOrFail($sapra->id);
        $sapras->kode = $request->kode;
        $sapras->namasapras = $request->namasapras;
        $sapras->qty = $request->qty;
        $sapras->satuan = $request->satuan;
        if ($request->file('gambar')) {
            $image_path = public_path("/image/".$sapras->gambar);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $image = $request->file('gambar');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $sapras['gambar'] = "$profileImage";
        } else {
            unset($sapras['image']);
        }
        $sapras->update();

        return redirect()->route('sapras.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $saprass = Sapras::find($id);

       $saprass->delete();

       return redirect()->route('sapras.index')->with(['succes' => 'Data Berhasil Dihapus']);
    }
}
