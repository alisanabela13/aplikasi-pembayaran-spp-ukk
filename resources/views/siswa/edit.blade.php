@extends('layouts.partials.app')
@section('title')
    Edit Siswa
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Siswa</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Data Siswa</h4>
                        <div class="card-header-form">
                            <a href="{{route('siswa')}}" class="btn text-white" style="background-color: #540b0e">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('siswa.update', ['id' => $siswa->id])}}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" required id="nama" name="nama" value="{{$siswa->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{old('nisn')}}" placeholder="{{$siswa->nisn}}">
                                        @error('nisn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="{{$siswa->nis}}" value="{{old('nis')}}">
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
                                        <select name="id_kelas" class="form-control" value="{{ old('id_kelas') }}" data-live-search="true" required>
                                            <option value=''>- Pilih -</option>
                                            @foreach($kelas as $kls)     
                                                <option value="{{ $kls['id'] }}" {{$kls->id == $siswa->id_kelas ?  'selected' : ''}}> {{$kls->nama}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">No Telepon</label>
                                        <input type="number" class="form-control" required id="no_tlp" name="no_tlp" value="{{$siswa->no_tlp}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="{{$siswa->User->email}}">
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
                                        <select name="id_jenjang" class="form-control" value="{{ old('id_jenjang') }}" data-live-search="true" required>
                                            <option value=''>- Pilih -</option>
                                            @foreach($jenjang as $jjg)     
                                                <option value="{{ $jjg['id'] }}" {{$jjg->id == $siswa->id_jenjang ?  'selected' : ''}}>Kelas {{$jjg->kelas}} Semester {{$jjg->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" type="text" class="form-control" required value="" style="height: 180px;">{{$siswa->alamat}}</textarea>
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