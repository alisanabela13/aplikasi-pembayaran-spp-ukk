<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;
use App\Petugas;
use App\Spp;
use App\Tapel;
use App\Jenjang;
use App\Kelas;
use App\Pembayaran;


class PembayaranController extends Controller
{
    

    public function __construct(User $user, Siswa $siswa, Petugas $petugas, Spp $spp, Tapel $tapel, Pembayaran $pembayaran, Jenjang $jenjang, Kelas $kelas)
    {
        $this->user = $user;
        $this->siswa = $siswa;
        $this->petugas = $petugas;
        $this->spp = $spp;
        $this->tapel = $tapel;
        $this->pembayaran = $pembayaran;
        $this->jenjang = $jenjang;
        $this->kelas = $kelas;
    }

    public function create()
    {
        $spp = $this->spp->get();
        $tapel = $this->tapel->get();
        return view('pembayaran_siswa.create', compact('spp', 'tapel'));
    }

    public function historySiswa()
    {
        $pembayaran = Pembayaran::where('id_siswa',auth()->user()->Siswa->id)->get();
        return view('pembayaran_siswa.history', compact('pembayaran'));
    }

    public function bayarSiswa(Request $request)
    {
        $validate = $request->validate([
            'id_spp' => 'required',
            'id_tapel' => 'required',
            'bukti_pembayaran' => 'required|mimes:jpeg,png,jpg|max:2048',
            'tgl_pembayaran' => 'required'
        ]);

        $file = $request->file('bukti_pembayaran');
        $get_name = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('bukti/'), $get_name);

        $data_spp = SPP::find($request->id_spp);

        $pembayaran = new Pembayaran;
        $pembayaran->id_siswa = auth()->user()->Siswa->id;
        $pembayaran->id_spp = $request->id_spp;
        $pembayaran->id_tapel = $request->id_tapel;
        $pembayaran->biaya = $data_spp->nominal;
        $pembayaran->bukti_pembayaran = $get_name;
        $pembayaran->tgl_pembayaran = $request->tgl_pembayaran;
        $pembayaran->status = 'Belum Terverifikasi';
        $datacek = $this->pembayaran->where('id_spp', $request->id_spp)->where('id_siswa', auth()->user()->Siswa->id)->whereIn('status', ['Belum Terverifikasi','Lunas'])->first();

        if($datacek == true)
        {
            return redirect()->route('bayar.create')->with(['message' => 'Anda Sudah Pernah MengUpload Data ini, Lihat History Pembayaran!', 'type' => 'danger']);
        }
        else{
            $pembayaran->save();
            if($pembayaran == true)
                {
                    return redirect()->route('bayar.create')->with(['message' => 'Berhasil MengUpload Data!', 'type' => 'success']);
                }
        }
    }

    public function bayarLunas()
    {
        $pembayaran = Pembayaran::where('status', 'Lunas')->get();
        return view('pembayaran_petugas.lunas', compact('pembayaran'));
    }

    public function bayarTolak()
    {
        $pembayaran = Pembayaran::where('status', 'Ditolak')->get();
        return view('pembayaran_petugas.tolak', compact('pembayaran'));
    }

    public function belumTerverifikasi()
    {
        $pembayaran = Pembayaran::where('status', 'Belum Terverifikasi')->get();
        return view('pembayaran_petugas.belumverif', compact('pembayaran'));
    }

    public function tindak($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        return view('pembayaran_petugas.tindak', compact('pembayaran'));
    }

    public function Lunas(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->status = 'Lunas';
        $pembayaran->id_petugas = auth()->user()->Petugas->id;
        $pembayaran->save();

        if($pembayaran == true)
        {
            return redirect()->route('belumverif')->with(['message' => 'Berhasil Memverifikasi Data!', 'type' => 'success']);
        }else{
            return redirect()->route('belumverif')->with(['message' => 'Gagal Memverifikasi Data!', 'type' => 'danger']);
        }
    }

    public function Tolak(Request $request, $id)
    {
        $validate = $request->validate([
            'note' => 'required'
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->status = 'Ditolak';
        $pembayaran->id_petugas = auth()->user()->Petugas->id;
        $pembayaran->note = $request->note;
        $pembayaran->save();



        if($pembayaran == true)
        {
            return redirect()->route('belumverif')->with(['message' => 'Berhasil Memverifikasi Data!', 'type' => 'success']);
        }else{
            return redirect()->route('belumverif')->with(['message' => 'Gagal Memverifikasi Data!', 'type' => 'danger']);
        }
    }

    public function laporan()
    {
        $spp = Spp::all();
        $kelas = Kelas::all();
        $tapel = Tapel::all();
        return view('laporan.index', compact('spp', 'kelas', 'tapel'));
    }

    public function cetakFilter($spp, $tapel, $kelas)
    {
        $pembayaran = Pembayaran::with('Spp', 'Tapel', 'Siswa')->where('id_tapel', $tapel)->where('id_spp', $spp)->whereHas('Siswa', function($query) use ($kelas) { return $query->where('id_kelas', $kelas); })->where('status', 'Lunas')->get();
        return view('laporan.cetak', compact('pembayaran'));
    }

    public function cetakSemua()
    {
        $pembayaran = Pembayaran::where('status', 'Lunas')->get();
        return view('laporan.cetak', compact('pembayaran'));
    }
}