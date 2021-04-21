<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Petugas;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        if(auth()->user()->role === 'Admin')
        {
            $validate = $request->validate([
                'nama' => 'required',
                'nik' => 'unique:petugas',
                'no_tlp' => 'required',
                'email' => 'unique:users',
                'alamat' => 'required'
            ]);

            $petugas = Petugas::find(auth()->user()->Petugas->id);
            $petugas->nama = $request->nama;
            $petugas->nik = $request->nik ?? $petugas->nik;
            $petugas->nip = $request->nip;
            $petugas->no_tlp = $request->no_tlp;
            $petugas->alamat = $request->alamat;
            if($petugas->save()) {
                $petugas->User->update([
                    "username" => $request->nik ?? $petugas->nik,
                    "email" => $request->email ?? $petugas->User->email
                ]);
            }
            if($petugas == true) {
                return redirect()->route('profil')->with(['message' => 'Berhasil Mengedit profil', 'type' => 'success']);
            } else {
                return redirect()->route('profil')->with(['message' => 'Gagal Mengedit profil', 'type' => 'danger']);
            }

        }elseif(auth()->user()->role === 'Petugas')
        {
            $validate = $request->validate([
                'no_tlp' => 'required',
                'email' => 'unique:users',
                'alamat' => 'required'
            ]);

            $petugas = Petugas::find(auth()->user()->Petugas->id);
            $petugas->no_tlp = $request->no_tlp;
            $petugas->alamat = $request->alamat;
            if($petugas->save()) {
                $petugas->User->update([
                    "email" => $request->email ?? $petugas->User->email
                ]);
            }
            if($petugas == true) {
                return redirect()->route('profil')->with(['message' => 'Berhasil Mengedit profil', 'type' => 'success']);
            } else {
                return redirect()->route('profil')->with(['message' => 'Gagal Mengedit profil', 'type' => 'danger']);
            }

        }else
        {
            $validate = $request->validate([
                'no_tlp' => 'required',
                'email' => 'unique:users',
                'alamat' => 'required'
            ]);

            $siswa = Siswa::find(auth()->user()->Siswa->id);
            $siswa->no_tlp = $request->no_tlp;
            $siswa->alamat = $request->alamat;
            if($siswa->save()) {
                $siswa->User->update([
                    "email" => $request->email ?? $siswa->User->email
                ]);
            }

            if($siswa == true) {
                return redirect()->route('profil')->with(['message' => 'Berhasil Mengedit profil', 'type' => 'success']);
            } else {
                return redirect()->route('profil')->with(['message' => 'Gagal Mengedit profil', 'type' => 'danger']);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $validate = $request->validate([
			'passwordLama' => 'required',
			'password' => 'required|confirmed|min:8'
		], [
			'passwordLama.required' => 'Masukan password lama anda',
			'password.required' => 'Masukan password baru anda',
			'password.confirmed' => 'Password tidak cocok, harap konfirmasi ulang password anda',
			'password.min' => 'Password harus berisi minimal 8 karakter'
		]);

        $user = User::find(auth()->user()->id);

        if(Hash::check($request->passwordLama, $user->password))
        {
            if($user->update(['password' => Hash::make($request->password)]))
            {
                return redirect()->route('profil')->with([
                    'message' => 'Password Anda Berhasil Diganti!',
                    'type' => 'success'
                ]);
            }
            return redirect()->route('profil')->with([
                'message' => 'Gagal Mengganti Password!',
                'type' => 'danger'
            ]);
        }
        return redirect()->route('profil')->withErrors(['passwordLama' => 'Password Lama Anda Tidak Tepat!']);
    }
}
