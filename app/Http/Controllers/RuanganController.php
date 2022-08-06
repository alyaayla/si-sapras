<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\File;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::latest()->get();
        return view('admin.ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);
    
       

        $ruangan = new Ruangan();
        $ruangan->name = $request->name;
        $ruangan->save();

        return redirect()->route('ruangan.index')
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
    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit',compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $ruangan = Ruangan::findOrFail($ruangan->id);
        $ruangan->name = $request->name;
        
        $ruangan->update();

        return redirect()->route('ruangan.index')
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
        $ruangan = Ruangan::find($id);

        $ruangan->delete();
 
        return redirect()->route('ruangan.index')->with(['succes' => 'Data Berhasil Dihapus']);
    }
}
