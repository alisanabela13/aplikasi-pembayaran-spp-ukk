@extends('layouts.partials.app')
@section('title')
    Tambah Petugas
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Petugas</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Petugas</h4>
                        <div class="card-header-form">
                            <a href="{{ route('petugas') }}" class="btn text-white" title="Kembali" style="background-color: #540b0e;">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('petugas.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" required id="nama" name="nama" value="{{old('nama')}}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror" required id="nik" name="nik" value="{{old('nik')}}">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP <small>(Jika Petugas Tidak Memiliki NIP, Silahkan Kosongkan Saja)</small></label>
                                            <input type="number" class="form-control"  id="nip" name="nip" value="{{old('nip')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="role">Posisi</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value='' disabled selected>- Pilih -</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">No Telpon</label>
                                        <input type="number" class="form-control" required id="no_tlp" name="no_tlp" value="{{old('no_tlp')}}">
                                        @error('no_tlp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" required id="email" name="email" value="{{old('email')}}">
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
                                        <textarea name="alamat" id="alamat" type="text" class="form-control" required value="{{old('alamat')}}" style="height: 180px;"></textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn text-white" type="submit" style="background-color: #540b0e">Simpan</button>
                        </form>
                    </div>
                </div>
                        
                
            </div>
        </section>
    </div>
</div>
@endsection