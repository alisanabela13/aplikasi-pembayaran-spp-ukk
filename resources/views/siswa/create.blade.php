@extends('layouts.partials.app')
@section('title')
    Tambah Siswa
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Siswa</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Siswa</h4>
                        <div class="card-header-form">
                            <a href="{{ route('siswa') }}" class="btn text-white" title="Kembali" style="background-color: #540b0e;">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('siswa.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" required id="nama" name="nama" value="{{old('nama')}}">
                                        @error('nama')
                                            <span class="invalid-feedback " role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="number" class="form-control form-control @error('nisn') is-invalid @enderror" required id="nisn" name="nisn" value="{{old('nisn')}}">
                                        @error('nisn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="number" class="form-control form-control @error('nis') is-invalid @enderror" required id="nis" name="nis" value="{{old('nis')}}">
                                        @error('nis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="id_kelas">Kelas</label>
                                        <select name="id_kelas" id="id_kelas" class="form-control" required>
                                            <option value='' disabled selected>- Pilih -</option>
                                            @foreach ($kelas as $kls)
                                                <option value="{{$kls['id']}}">{{$kls->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_kelas')
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
                                        <label for="id_jenjang">Awal Masuk</label>
                                        <select name="id_jenjang" id="id_jenjang" class="form-control" required>
                                            <option value='' disabled selected>- Pilih -</option>
                                            @foreach ($jenjang as $jjg)
                                                <option value="{{$jjg['id']}}">Kelas {{$jjg->kelas}} Semester {{$jjg->semester}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_jenjang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
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