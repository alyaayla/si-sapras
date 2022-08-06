<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaprasPinjam;
use Illuminate\Support\Facades\File;

class SaprasPinjamController extends Controller
{
    public function index($id)
    {
        $datas = SaprasPinjam::where('peminjaman_id', $id)->latest()->get();
        return view('admin.sapras_pinjam.index', compact('datas'));
    }

    // public function show($id)
    // {
        
    // }

}
