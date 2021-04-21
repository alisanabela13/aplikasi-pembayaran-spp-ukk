@extends('layouts.partials.app')
@section('title')
    Laporan
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Pembayaran</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Generate Laporan Pembayaran SPP</h4>
                    </div>
                    <div class="card-body p-3">
                            <div class="row mt-3" style="text-align: center;">
                                <div class="col-md-4">
                                    <label for="jenjang">Untuk Pembayaran</label>
                                    <select name="spp" id="spp" class="form-control" required>
                                        @foreach ($spp as $espp)
                                            <option value="{{$espp['id']}}">Kelas {{$espp->Jenjang->kelas}} Semester {{$espp->Jenjang->semester}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="tapel">Tahun Ajaran</label>
                                    <select name="tapel" id="tapel" class="form-control" required>
                                        @foreach ($tapel as $tpl)
                                            <option value="{{$tpl->id}}">{{$tpl->dari}}/{{$tpl->sampai}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="kelas">Kelas Siswa</label>
                                    <select name="kelas" id="kelas" class="form-control" required>
                                        @foreach ($kelas as $kls)
                                            <option value="{{$kls->id}}">{{$kls->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12" style="text-align: center;">
                                    <br><br><br><br>
                                    <a href="" onclick="this.href='/laporan/cetak/filter/'+document.getElementById('spp').value + '/' + document.getElementById('tapel').value + '/' + document.getElementById('kelas').value" type="submit" class="btn text-white mt-5" style="background-color: black" target="_blank">Cetak Laporan Berdasarkan Filter <i class="fas fa-print"></i></a>
                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                    
                                    <a href="{{route('cetak.laporan.semua')}}" class="btn text-white mt-5" style="background-color:#343a40">Cetak Laporan Semua Data <i class="fas fa-print"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection