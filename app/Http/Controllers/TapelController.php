<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tapel;
use App\Pembayaran;

class TapelController extends Controller
{
    public function __construct(Tapel $tapel, Pembayaran $pembayaran)
    {
        $this->tapel = $tapel;
        $this->pembayaran = $pembayaran;
    }

    public function index()
    {
        $tapel = $this->tapel->get();
        return view('tapel.index', compact('tapel'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'dari' => 'required|unique:tapels'
        ]);

        $insert = Tapel::create([
            'dari' => $request->dari,
            'sampai' => $request->dari+1
        ]);

        if($insert == true)
        {
            return redirect()->route('tapel')->with(['message' => 'Berhasil Menambah Tahun Ajaran!', 'type' => 'success']);
        }else{
            return redirect()->route('tapel')->with(['message' => 'Gagal Menambah Tahun Ajaran!', 'type' => 'danger']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dari' => 'required|unique:tapels'
        ],
        [
            'dari.required' => 'Masukkan Tahun!'
        ]);

        $update = Tapel::where('id', $id)->update([
            'dari' => $request->dari,
            'sampai' => $request->dari+1
        ]);

        if($update == true)
        {
            return redirect()->route('tapel')->with(['message' => 'Berhasil Mengedit Tahun Ajaran!', 'type' => 'success']);
        }else{
            return redirect()->route('tapel')->with(['message' => 'Gagal Mengedit Tahun Ajaran!', 'type' => 'danger']);
        }
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id_tapel', $id)->first();
        if($pembayaran)
        {
            return redirect()->route('tapel')->with(['message' => 'Gagal Menghapus Tahun Ajaran!', 'type' => 'danger']);
        }else{
            Tapel::destroy($id);
            return redirect()->route('tapel')->with(['message' => 'Berhasil Menghapus Tahun Ajaran!', 'type' => 'success']);
        }
    }
}
