<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Sapras;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('peminjam.index');
    }

    public function adminHome()
    {
        $graphPemnjaman = Peminjaman::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tanggal) as month_name"))
                    ->whereYear('tanggal', date('Y'))
                    ->groupBy(DB::raw("Month(tanggal)"))
                    ->pluck('count', 'month_name');
 
        $labels = $graphPemnjaman->keys();
        $data = $graphPemnjaman->values();

        $sapras = Sapras::count();
        $peminjaman = Peminjaman::count();
        $ruangan = ruangan::count();
        $user = User::where('is_admin', 0)->count();
        return view('admin.index', compact('sapras', 'peminjaman', 'ruangan', 'user', 'labels', 'data'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
