<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Siswa;
use App\Prodi;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;


class KelasController extends Controller
{
    public function __construct(Kelas $kelas, Siswa $siswa, Prodi $prodi)
    {
        $this->kelas = $kelas;
        $this->siswa = $siswa;
        $this->prodi = $prodi;
    }

    public function index()
    {
        $kelas = $this->kelas->get();
        $prodi = $this->prodi->get();
        return view('kelas.index', compact('kelas', 'prodi'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kelas,nama',
            'id_prodi' => 'required'
        ]);

        $insert = Kelas::insert([
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi
        ]);

        if($insert == true)
        {
            return redirect()->route('kelas')->with(['message' => 'Berhasil Menambah Kelas!', 'type' => 'success']);
        }else{
            return redirect()->route('kelas')->with(['message' => 'Gagal Menambah Kelas!', 'type' => 'danger']);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kelas,nama',
            'id_prodi' => 'required'
        ]);

        $update = Kelas::where('id', $id)->update([
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi
        ]);

        if($update == true)
        {
            return redirect()->route('kelas')->with(['message' => 'Berhasil Mengedit Kelas!', 'type' => 'success']);
        }else{
            return redirect()->route('kelas')->with(['message' => 'Gagal Mengedit Kelas!', 'type' => 'danger']);
        }
    }

    public function destroy($id)
    {
        $siswa = Siswa::where('id_kelas', $id)->first();
        if($siswa)
        {
            return redirect()->route('kelas')->with(['message' => 'Gagal Menghapus Kelas!', 'type' => 'danger']);
        }else{
            Kelas::destroy($id);
            return redirect()->route('kelas')->with(['message' => 'Berhasil Menghapus Kelas!', 'type' => 'success']);
        }
    }
}
