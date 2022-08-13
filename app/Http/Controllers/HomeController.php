<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Sapras;
use Auth;

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
        $sapras = Sapras::count();
        $peminjaman = Peminjaman::count();
        $ruangan = ruangan::count();
        $user = User::where('is_admin', 0)->count();
        return view('admin.index', compact('sapras', 'peminjaman', 'ruangan', 'user'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
