<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Jenjang;
use App\Kelas;
use App\User;
use App\Pembayaran;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;
use File;

class SiswaController extends Controller
{
    public function __construct(Siswa $siswa, User $user, Jenjang $jenjang, Kelas $kelas, Pembayaran $pembayaran)
    {
        $this->siswa = $siswa;
        $this->user = $user;
        $this->jenjang = $jenjang;
        $this->kelas = $kelas;
        $this->pembayaran = $pembayaran;
    }

    public function index()
    {
        $siswa = $this->siswa->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $user = $this->user->get();
        $jenjang = $this->jenjang->get();
        $kelas = $this->kelas->get();
        return view('siswa.create', compact('user', 'jenjang', 'kelas'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswas',
            'nis' => 'required|unique:siswas',
            'id_kelas' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|unique:users',
            'id_jenjang' => 'required',
            'alamat' => 'required'
        ]);

        DB::beginTransaction();

        try{
            //create user
            $user = new User();
            $user->username = $request->nisn;
            $user->email = $request->email;
            $user->password = bcrypt($request->nisn);
            $user->role = "Siswa";
            $user->save();

            //create petugas
            $siswa = new Siswa();
            $siswa->id_user = $user->id;
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->nis = $request->nis;
            $siswa->alamat = $request->alamat;
            $siswa->no_tlp = $request->no_tlp;
            $siswa->id_jenjang = $request->id_jenjang;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->status = "Aktif";
            $siswa->save();

            DB::commit();

            return redirect()->route('siswa')->with(['message' => 'Berhasil Menambah Siswa!', 'type' => 'success']);

        }catch( Exception $e){
            DB::rollBack();
            return redirect()->route('siswa')->with(['message' => 'Gagal Menambah Siswa!', 'type' => 'danger']);
        }
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::all();
        $jenjang = Jenjang::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'jenjang'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nisn' => 'unique:siswas',
            'nis' => 'unique:siswas',
            'id_kelas' => 'required',
            'no_tlp' => 'required',
            'email' => 'unique:users',
            'id_jenjang' => 'required',
            'alamat' => 'required'
        ]);

        $siswa = Siswa::find($id);
            $siswa = Siswa::where('id', $id)->first();
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn ?? $siswa->nisn;
            $siswa->nis = $request->nis ?? $siswa->nis;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->id_jenjang = $request->id_jenjang;
            $siswa->no_tlp = $request->no_tlp;
            $siswa->alamat = $request->alamat;
        if($siswa->save()) {
            $siswa->User->update([
                "username" => $request->nisn ?? $siswa->nisn,
                "email" => $request->email ?? $siswa->User->email
                ]);
        }
        
        if($siswa == true) {
            return redirect()->route('siswa')->with(['message' => 'Berhasil Mengedit Siswa!', 'type' => 'success']);
        } else {
            return redirect()->route('siswa')->with(['message' => 'Gagal Mengedit Siswa!', 'type' => 'danger']);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try{
           $siswa = Siswa::find($id);
           $siswa = Siswa::where('id_user', $id)->first();
           $pembayaran = Pembayaran::find($id);
           if($siswa->delete()){
               $siswa->User->delete();
           }
            DB::commit();
            
            return redirect()->route('siswa')->with(['message' => 'Berhasil Menghapus Siswa!', 'type' => 'success']);
        }catch( Exception $e){
            DB::rollBack();
            return redirect()->route('siswa')->with(['message' => 'Gagal Menghapus Siswa!', 'type' => 'danger']);
        }
    }
}
