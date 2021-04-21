@extends('layouts.partials.app')
@section('title')
    Belum Terverifikasi
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran Belum Terverifikasi</h1>
            </div>
        </section>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Pembayaran Belum Terverifikasi</h4>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-bordered table-striped" style="width: 100%; text-align: center;" id="table-index">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Untuk Pembayaran</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pembayaran as $pmb)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$pmb->Siswa->nisn}}</td>
                                                        <td>{{$pmb->Siswa->nama}}</td>
                                                        <td>{{$pmb->Siswa->Kelas->nama}}</td>
                                                        <td>Kelas {{$pmb->Spp->Jenjang->kelas}} Semester {{$pmb->Spp->Jenjang->semester}}<br>{{$pmb->Tapel->dari}}/{{$pmb->Tapel->sampai}}</td>
                                                        <td>
                                                            <a href="{{route('tindak', ['id' => $pmb["id"]])}}" class="btn text-white " type="submit" style="background-color: #540b0e">Tindak!</a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </section> --}}
    </div>
</div>
@endsection