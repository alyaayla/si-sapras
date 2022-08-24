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
        return view('admin.sapras.index');
    }
    
    // public function index_peminjam()
    // {
    //     $saprass = Sapras::latest()->get();
    //     return view('admin.sapras.index', compact('saprass'));
        
    // }

    public function fetchAll(Request $request)
    {
		if(!empty($request->from_date))
        {
            $sapras = Sapras::whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->orderBy('created_at', 'desc')
                    ->get();
        }
        else
        {
            $sapras = Sapras::latest()->get();
        }
		$output = '';
		if ($sapras->count() > 0) {
			$output .= '<table class="p-0 table table-striped table-sm text-center align-middle">
            <thead class="text-darken">
                <th>No.</th>
                <th>
                    Kode
                </th>
                <th class="text-center">
                    Nama Sapras
                </th>
                <th class="text-center">
                    Ruangan
                </th>
                <th class="text-center">
                    Qty
                </th>
                <th class="text-center">
                    Satuan
                </th>
                <th class="text-center">
                    Gambar
                </th>
                <th class="text-center">
                    Tanggal Peminjaman
                </th>
                <th class="text-center">
                    Action
                </th>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($sapras as $pinjam) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->kode .'</p>
                    </td>
                    <td>
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->namasapras .'</p>
                    </td>
                    <td>
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->ruangan->name .'</p>
                    </td>
                    <td>
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->qty .'</p>
                    </td>
                    <td>
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->satuan .'</p>
                    </td>
                    <td>
                        <img src="/image/'. $pinjam->gambar.'" width="100px">
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold m-0">
                            '. $pinjam->created_at->format('d-m-Y') .'</p>
                    </td>
                    <td class="align-middle text-center">
                        <a href="sapras/'.$pinjam->id.'/edit/" class="btn btn-warning btn-sm"><i
                            class="fa fa-edit"></i></a>
                        <a href="#" id="'. $pinjam->id .'" class="btn btn-danger btn-sm hapusSapras"><i
                            class="fa fa-trash"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Sapras!</h1>';
		}
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
        
        notify()->success("Sapras berhasil ditambahkan","Success","topRight");
        return redirect()->route('sapras.index');
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

        notify()->success("Sapras berhasil diperbarui","Success","topRight");
        return redirect()->route('sapras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $saprass = Sapras::find($id);
        $saprass->delete();
    }
}
