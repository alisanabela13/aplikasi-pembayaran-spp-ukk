<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
use App\Jenjang;

class SppController extends Controller
{
    public function __construct(Spp $spp, Jenjang $jenjang)
    {
        $this->spp = $spp;
        $this->jenjang = $jenjang;
    }

    public function index()
    {
        $spp = $this->spp->get();
        $jenjang = $this->jenjang->get();
        return view('spp.index', compact('spp', 'jenjang'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required'
        ],
        [
            'nominal.required' => 'Masukkan Biaya Yang Harus Dibayar!'
        ]);

        $update = Spp::where('id', $id)->update([
            'nominal' => $request->nominal
        ]);

        if($update == true)
        {
            return redirect()->route('spp')->with(['message' => 'Berhasil Mengedit Biaya SPP !', 'type' => 'success']);
        }else{
            return redirect()->route('spp')->with(['message' => 'Gagal Mengedit Biaya SPP !', 'type' => 'danger']);
        }
    }
}
