<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petunjuk;

class PetunjukController extends Controller
{

    public function __construct(Petunjuk $petunjuk)
    {
        $this->petunjuk = $petunjuk;
    }

    public function index()
    {
        $petunjuk = Petunjuk::first();
        return view('petunjuk.index', compact('petunjuk'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ],
        [
            'judul.required' => 'Judul Tidak Boleh Kosong!',
            'isi.required' => 'Isi Tidak Boleh Kosong!'
        ]);

        $petunjuk = Petunjuk::first()->update($request->except('_token'));

        return redirect('petunjuk')->with([
            'message' => $petunjuk ? 'Berhasil Mengedit Petunjuk Pembayaran!' : 'Gagal Mengedit Petunjuk Pembayaran, silahkan coba lagi!',
            'type' => $petunjuk ? 'success' : 'danger'
        ]);
    }
}
