<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\SaprasPinjam;
use App\Models\Ruangan;
use App\Models\Sapras;
use App\Models\User;
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

    public function fetchAll(Request $request)
    {
		if(!empty($request->from_date))
        {
            $peminjaman = Peminjaman::whereBetween('tanggal', array($request->from_date, $request->to_date))
                    ->orderBy('created_at', 'desc')
                    ->get();
        }
        else
        {
            $peminjaman = Peminjaman::latest()->get();
        }
		$output = '';
		if ($peminjaman->count() > 0) {
			$output .= '<table class="p-0 display table table-striped table-sm text-center align-middle">
            <thead class="text-darken">
                <th>No.</th>
                <th>
                    Name Peminjam
                </th>
                <th class="text-center">
                    Tanggal
                </th>
                <th class="text-center">
                    Ruangan
                </th>
                <th class="text-center">
                    Sapras
                </th>
                <th class="text-center">
                    Status
                </th>
                <th class="text-center">
                    Aksi
                </th>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($peminjaman as $pinjam) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>
                        '. $pinjam->user->name .'
                    </td>
                    <td class="align-middle text-center">
                            '. date("d-F-Y", strtotime($pinjam->tanggal)).'
                    </td>
                    <td class="align-middle text-center text-sm">
                        '. $pinjam->ruangan->name .'
                    </td>
                    <td class="align-middle text-center">
                        <a href="/sapras_pinjam/'.$pinjam->id.'" class="btn btn-primary btn-sm">
                            Data Barang
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        '. $pinjam->status .'
                    </td>
                    <td class="align-middle text-center">
                        <a href="#" id="'. $pinjam->id .'" class="btn btn-warning btn-sm editPinjam"><i
                            class="fa fa-recycle"></i></a>
                        <a href="#" id="'. $pinjam->id .'" class="btn btn-danger btn-sm hapusPinjam"><i
                            class="fa fa-trash"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody>
            <tfoot>
            <tr>
            <th>No.</th>
            <th>
                Name Peminjam
            </th>
            <th class="text-center">
                Tanggal
            </th>
            <th class="text-center">
                Ruangan
            </th>
            <th class="text-center">
                Sapras
            </th>
            <th class="text-center">
                Status
            </th>
            </tr>
        </tfoot></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Peminjaman!</h1>';
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('is_admin', 0)->latest()->get();
        $ruangan = Ruangan::all();
        return view('admin.peminjaman.create', compact('ruangan', 'user'));
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
        $data_peminjam->user_id = $request->user_id;
        $data_peminjam->ruangan_id = $request->ruangan_id;
        $data_peminjam->tanggal = $request->tanggal;
        $data_peminjam->status = "Sedang Dipinjam";
        $data_peminjam->save();
        
        $sapras_id = $request->input('sapras_id', []);
        $qty = $request->input('qty', []);
        $units = [];
        
        // echo "quantity";
        // echo "<br>";
        foreach ($qty as $key => $value) {
            if ($value != null) {
                $qtyTotal[] = $value;
            }
        }

        // foreach ($qtyTotal as $key => $value) {
        //     echo $value;
        //     echo "<br>";
        // }
        // echo "<br>";
        // echo "sapras_id";
        // echo "<br>";
        // foreach ($sapras_id as $key => $value) {
        //     echo $key . '-' . $value;
        //     echo "<br>";
        // }
        foreach ($sapras_id as $index => $unit) 
        {
            $units[] = [
                'peminjaman_id' => $data_peminjam->id,
                'sapras_id' => $sapras_id[$index],
                'qty' => $qtyTotal[$index],
            ];

            $check = Sapras::where('id', $unit)->get();
            foreach ($check as $key) 
            {
                if ($qty[$index] > $key->qty)
                {
                    $data_peminjam = Peminjaman::where('id', $data_peminjam->id)->delete();
                    notify()->warning("Peminjaman melebihi stok barang!","Gagal","topRight");
                    return redirect()->back();
                } 
                    else
                {
                    $sapras = Sapras::where('id', $unit)->first();
                    $sapras->qty = $sapras->qty - $qtyTotal[$index];
                    $sapras->update();
                    // notify()->success($sapras->qty,"Berhasil","topRight");
                    // return redirect()->back();
                }
            }
        }

        // // dd($units);
        SaprasPinjam::insert($units);

        notify()->success("Peminjaman berhasil ditambahkan","Success","topRight");
        return redirect()->route('peminjaman.index');
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
    public function destroy(Request $request)
    {
        $id = $request->id;
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
    }

    public function updatePinjam(Request $request)
    {
        $id = $request->id;

        $check = Peminjaman::where('id', $id)->where('status', '!=', 'Dikembalikan')->exists();
        if ($check) {
            $data_peminjam = Peminjaman::where('id', $id)->first();
            $data_peminjam->status = "Dikembalikan";
            $data_peminjam->update();

            $saprasPinjam = SaprasPinjam::where('peminjaman_id', $data_peminjam->id)->get();
            foreach ($saprasPinjam as $value) {
                $sapras = Sapras::where('id', $value->sapras_id)->first();
                $sapras->qty = $sapras->qty + $value->qty;
                $sapras->update();
            }
        }
    }
}
