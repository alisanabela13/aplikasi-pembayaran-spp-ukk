@extends('layouts.partials.app')
@section('title')
    Profil
@endsection
@section('content')
<div class="main_wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Profil</h1>
            </div>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="row">
                   @if (auth()->user()->role === 'Admin')
                       <div class="col-md-6">
                           <div class="card">
                               <div class="card-header">
                                   <h4>Form Edit Profil</h4>
                               </div>
                               <div class="card-body p-3">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <form action="{{route('profil.update')}}" method="POST">
                                               @method('PUT')
                                               @csrf
                                               <div class="form-group">
                                                   <label for="nama">Nama</label>
                                                   <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$user->Petugas->nama}}" required>
                                                   @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                   @enderror
                                               </div>
                                               <div class="form-group">
                                                   <label for="nik">NIK</label>
                                                   <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}" placeholder="{{$user->Petugas->nik}}">
                                                   @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                   @enderror
                                               </div>
                                               <div class="form-group">
                                                    <label for="nip">NIP <small>(Jika Tidak Punya NIP, Silahkan Kosongkan Saja)</small></label>
                                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{$user->Petugas->nip}}" placeholder="">
                                                    @error('nip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_tlp">No Telepon</label>
                                                    <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{$user->Petugas->no_tlp}}" placeholder="" required>
                                                    @error('no_tlp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-Mail</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="{{$user->email}}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">Alamat</label>
                                                    <textarea name="alamat" id="alamat" style="height: 80px;" type="text" class="form-control" required>{{$user->Petugas->alamat}}</textarea>
                                                    @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn text-white" style="background-color: #540b0e">Simpan Perubahan</button>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @elseif(auth()->user()->role === 'Petugas')
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profil</h4>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Nama</h6>
                                            <label for="nama">{{$user->Petugas->nama}}</label>
                                            <hr>
                                            <h6>Posisi</h6>
                                            <label for="role">
                                                <span class="badge badge-success">
                                                    {{$user->role}}
                                                </span>
                                            </label>
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>NIK/Username</h6>
                                            <label for="nik">{{$user->Petugas->nik}}</label>
                                            <hr>
                                            <h6>NIP</h6>
                                            <label for="nip">{{$user->Petugas->nip ? $user->Petugas->nip : '-'}}</label>
                                            <hr>
                                        </div>
                                    </div>
                                    <br>
                                    <form action="{{route('profil.update')}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                         <div class="form-group">
                                             <label for="no_tlp">No Telepon</label>
                                             <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{$user->Petugas->no_tlp}}"  required>
                                             @error('no_tlp')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                         </div>
                                         <div class="form-group">
                                             <label for="email">E-Mail</label>
                                             <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="{{$user->email}}">
                                             @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                         </div>
                                         <div class="form-group">
                                             <label for="nip">Alamat</label>
                                             <textarea name="alamat" id="alamat" style="height: 80px;" type="text" class="form-control" required>{{$user->Petugas->alamat}}</textarea>
                                             @error('alamat')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                         </div>
                                         <button type="submit" class="btn text-white" style="background-color: #540b0e">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @else 
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profil</h4>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Nama</h6>
                                                <label for="nama">{{$user->Siswa->nama}}</label>
                                                <hr>
                                                <h6>NISN/Username</h6>
                                                <label for="nisn">{{$user->Siswa->nisn}}</label>
                                                <hr>
                                                <h6>NIS</h6>
                                                <label for="nis">{{$user->Siswa->nis}}</label>
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Awal Masuk</h6>
                                                <label for="jenjang">Kelas {{$user->Siswa->Jenjang->kelas}} Semester {{$user->Siswa->Jenjang->semester}}</label>
                                                <hr>
                                                <h6>Prodi</h6>
                                                <label for="prodi">{{$user->Siswa->Kelas->Prodi->nama_prodi}}</label>
                                                <hr>
                                                <h6>Kelas</h6>
                                                <label for="kelas">{{$user->Siswa->Kelas->nama}}</label>
                                                <hr>
                                            </div>
                                        </div>
                                        <br>
                                        <form action="{{route('profil.update')}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                             <div class="form-group">
                                                 <label for="no_tlp">No Telepon</label>
                                                 <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{$user->Siswa->no_tlp}}" >
                                                 @error('no_tlp')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group">
                                                 <label for="email">E-Mail</label>
                                                 <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="{{$user->email}}">
                                                 @error('email')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group">
                                                 <label for="nip">Alamat</label>
                                                 <textarea name="alamat" id="alamat" style="height: 80px;" type="text" class="form-control" required>{{$user->Siswa->alamat}}</textarea>
                                                 @error('alamat')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                             </div>
                                             <button type="submit" class="btn text-white" style="background-color: #540b0e">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                   <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                             <h4>Form Ganti Password</h4>
                           </div>
                           <div class="card-body p-3">
                             <div class="row">
                               <div class="col-12">
                                 <form action="{{route('profil.changePassword')}}" method="POST">
                                   @csrf @method('PUT')
                                   <div class="form-group">
                                     <label for="passwordLama">Password Lama</label>
                                     <input type="password" class="form-control" id="passwordLama" name="passwordLama">
                                     @error('passwordLama')
                                       <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ $message }}</strong>
                                       </span>
                                     @enderror
                                   </div>
                                   <div class="form-group">
                                     <label for="password">Password Baru</label>
                                     <input type="password" class="form-control" id="password" name="password">
                                     @error('password')
                                       <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ $message }}</strong>
                                       </span>
                                     @enderror
                                   </div>
                                   <div class="form-group">
                                     <label for="password_confirmation">Konfirmasi Password Baru</label>
                                     <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                   </div>
                                   <button type="submit" class="btn text-white" style="background-color: #540b0e">Ganti Password</button>
                                 </form>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                   </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection