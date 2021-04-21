<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Kelas;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function __construct(Prodi $prodi)
    {
        $this->prodi = $prodi;
    }

    public function index()
    {
        $prodi = $this->prodi->get();
        return view('prodi.index', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi'
        ],
        [
            'nama_prodi.required' => 'Nama Prodi Harus Diisi!'
        ]);

        $insert = Prodi::insert([
            'nama_prodi' => $request->nama_prodi
        ]);

        if($insert == true)
        {
            return redirect()->route('prodi')->with(['message' => 'Berhasil Menambah Prodi!', 'type' => 'success']);
        }else{
            return redirect()->route('prodi')->with(['message' => 'Gagal Menambah Prodi!', 'type' => 'danger']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi'
        ],
        [
            'nama_prodi.required' => 'Nama Prodi Harus Diisi!'
        ]);
        
        $update = Prodi::where('id', $id)->update([
            'nama_prodi' => $request->nama_prodi
        ]);

        if($update == true)
        {
            return redirect()->route('prodi')->with(['message' => 'Berhasil Mengedit Prodi!', 'type' => 'success']);
        }else{
            return redirect()->route('prodi')->with(['message' => 'Gagal Mengedit Prodi!', 'type' => 'danger']);
        }
    }

    public function destroy($id)
    {
        $kelas = Kelas::where('id_prodi', $id)->first();
        if($kelas)
        {
            return redirect()->route('prodi')->with(['message' => 'Gagal Menghapus Prodi!', 'type' => 'danger']);
        }else{
            Prodi::destroy($id);
            return redirect()->route('prodi')->with(['message' => 'Berhasil Menghapus Prodi!', 'type' => 'success']);
        }
    }
}
