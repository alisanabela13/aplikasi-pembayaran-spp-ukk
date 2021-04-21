@extends('layouts.partials.app')
@section('title')
    Edit Petugas
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Petugas</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Data Petugas</h4>
                        <div class="card-header-form">
                            <a href="{{route('petugas')}}" class="btn text-white" style="background-color: #540b0e">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('petugas.update', ['id' => $petugas->id])}}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" required id="nama" name="nama" value="{{$petugas->nama}}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}" placeholder="{{$petugas->nik}}">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control" id="nip" name="nip" placeholder="{{!!$petugas->nip ? $petugas->nip : '-'}}" value="{{$petugas->nip}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Posisi</label>
                                        <select name="role" id="role" class="form-control">
                                            @if ($petugas->User->role === 'Admin') 
                                                <option value="Admin" selected>Admin</option>
                                                <option value="Petugas">Petugas</option>
                                            @else
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas" selected>Petugas</option>
                                            @endif
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">No Telepon</label>
                                        <input type="number" class="form-control" required id="no_tlp" name="no_tlp" value="{{$petugas->no_tlp}}">
                                        @error('no_tlp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="{{$petugas->User->email}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" type="text" class="form-control" required value="" style="height: 180px;">{{$petugas->alamat}}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn text-white" style="background-color: #540b0e">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection