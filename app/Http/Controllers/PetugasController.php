<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\User;
use App\Pembayaran;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;


class PetugasController extends Controller
{
    public function __construct(Petugas $petugas, User $user, Pembayaran $pembayaran)
    {
        $this->petugas = $petugas;
        $this->user = $user;
        $this->pembayaran = $pembayaran;
    }

    public function index()
    {
        $petugas = $this->petugas->get();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:petugas',
            'role' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|unique:users',
            'alamat' => 'required'
        ]);

        DB::beginTransaction();

        try{
            //create user
            $user = new User();
            $user->username = $request->nik;
            $user->email = $request->email;
            $user->password = bcrypt($request->nik);
            $user->role = $request->role;
            $user->save();

            //create petugas
            $petugas = new Petugas();
            $petugas->id_user = $user->id;
            $petugas->nama = $request->nama;
            $petugas->nip = $request->nip;
            $petugas->nik = $request->nik;
            $petugas->alamat = $request->alamat;
            $petugas->no_tlp = $request->no_tlp;
            $petugas->save();

            DB::commit();

            return redirect()->route('petugas')->with(['message' => 'Berhasil Menambah Petugas!', 'type' => 'success']);

        }catch( Exception $e){
            DB::rollBack();
            return redirect()->route('petugas')->with(['message' => 'Gagal Menambah Petugas!', 'type' => 'danger']);
        }
        
    }

    public function edit($id)
    {
        $petugas = Petugas::where('id', $id)->first();
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nik' => 'unique:petugas',
            'role' => 'required',
            'no_tlp' => 'required',
            'email' => 'unique:users',
            'alamat' => 'required'
        ]);

        $petugas = Petugas::find($id);
        $petugas = Petugas::where('id', $id)->first();
        $petugas->nama = $request->nama;
        $petugas->nik = $request->nik ?? $petugas->nik;
        $petugas->nip = $request->nip;
        $petugas->no_tlp = $request->no_tlp;
        $petugas->alamat = $request->alamat;
    if($petugas->save()) {
        $petugas->User->update([
            "username" => $request->nik ?? $petugas->nik,
            "email" => $request->email ?? $petugas->User->email,
            "role" => $request->role
            ]);
    }
        
        if($petugas == true) {
            return redirect()->route('petugas')->with(['message' => 'Berhasil Mengedit Petugas!', 'type' => 'success']);
        } else {
            return redirect()->route('petugas')->with(['message' => 'Gagal Mengedit Petugas!', 'type' => 'danger']);
        }
    }

    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas = Petugas::where('id_user', $id)->first();
        $pembayaran = Pembayaran::where('id_petugas', $petugas->id)->first();

        if($pembayaran)
        {
            return redirect()->route('petugas')->with(['message' => 'Gagal Menghapus Petugas!', 'type' => 'danger']);
        }elseif($petugas->delete()){
            $petugas->User->delete();
            return redirect()->route('petugas')->with(['message' => 'Berhasil Menghapus Petugas!', 'type' => 'success']);
        }

    }
}
