<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Petugas;
use App\Siswa;
use App\Kelas;
use App\Prodi;
use App\Petunjuk;
use App\Spp;
use App\Pembayaran;
use Carbon\Carbon;

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
        $this->now = Carbon::now();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $siswa = Siswa::count();
        $admin = User::where('role', 'Admin')->count();
        $petugas = User::where('role', 'Petugas')->count();
        $kelas = Kelas::count();
        $prodi = Prodi::count();
        $petunjuk = Petunjuk::first();
        $spp = Spp::all();
        $pembayaran = Pembayaran::where('status', 'Belum Terverifikasi')->count();
        $bayarhariini = Pembayaran::whereDate('created_at', $this->now->today()->format('Y-m-d'))->count();

        return view('home', compact('siswa', 'admin', 'kelas', 'prodi', 'petugas', 'petunjuk', 'spp', 'pembayaran', 'bayarhariini'));
    }

    
}
