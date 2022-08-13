<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\SaprasPinjam;
use App\Models\Ruangan;
use App\Models\Sapras;
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
        return view('admin.peminjaman.index');
    }

    public function fetchAll(Request $request)
    {
		if(!empty($request->from_date))
        {
            $peminjaman = Peminjaman::whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->orderBy('created_at', 'desc')
                    ->get();
        }
        else
        {
            $peminjaman = Peminjaman::latest()->get();
        }
		$output = '';
		if ($peminjaman->count() > 0) {
			$output .= '<table class="p-0 table table-striped table-sm text-center align-middle">
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
                    <div class="d-flex flex-column justify-content-center">
                        <p class="m-0 text-sm font-weight-bold">'. $pinjam->nama_peminjam .'</p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-sm font-weight-bold m-0">
                            '. $pinjam->created_at->format('d-m-Y') .'</p>
                        </td>
                    <td class="align-middle text-center text-sm">
                        <p class="m-0 text-sm">'. $pinjam->ruangan->name .'</p>
                    </td>
                    <td class="align-middle text-center">
                        <a href="/sapras_pinjam/'.$pinjam->id.'" class="btn btn-primary btn-sm">
                            Data Barang
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-sm font-weight-bold text-capitalize">'. $pinjam->status .'</span>
                    </td>
                    <td class="align-middle text-center">
                        <a href="#" id="'. $pinjam->id .'" class="btn btn-warning btn-sm editPinjam"><i
                            class="fa fa-recycle"></i></a>
                        <a href="#" id="'. $pinjam->id .'" class="btn btn-danger btn-sm hapusPinjam"><i
                            class="fa fa-trash"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
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
        $units = [];
        foreach ($sapras_id as $index => $unit) 
        {
            $units[] = [
                'peminjaman_id' => $data_peminjam->id,
                'sapras_id' => $sapras_id[$index],
                'qty' => $qty[$index],
            ];

            $sapras = Sapras::where('id', $unit)->first();
            $sapras->qty = $sapras->qty - $qty[$index];
            $sapras->update();
        }
        // dd($units);
        SaprasPinjam::insert($units);

        return redirect()->route('peminjaman.index')
                        ->with('success','peminjaman created successfully.');
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
