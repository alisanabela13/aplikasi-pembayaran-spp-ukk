@extends('layouts.partials.app')
@section('title')
    Lunas
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran Lunas</h1>
            </div>
        </section>
            <div class="section-body">
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Pembayaran Lunas</h4>
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
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-primary text-white" type="button" data-toggle="modal" data-target=".bs-example-modal-lg-{{$pmb->id}}" title="Detail data"><i class="fa fa-info px-1"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- modal --}}
                                                 <div class="modal fade bs-example-modal-lg-{{$pmb->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="text-align: center;">
                                                                        <a href={{ asset('bukti/'.$pmb->bukti_pembayaran) }}><img src="{{ asset('bukti/'.$pmb->bukti_pembayaran) }}" alt="" style="width:85%; height: 220px;"></a>
                                                                    </div>
                                                                    <div class="col-md-6" style="text-align: left;">
                                                                        <br>
                                                                        <h6>Nama Siswa</h6>
                                                                        <label for="nama">{{$pmb->Siswa->nama}}</label>
                                                                        <hr>
                                                                        <h6>NISN</h6>
                                                                        <label for="nisn">{{$pmb->Siswa->nisn}}</label>
                                                                        <hr>
                                                                        <h6>Kelas</h6>
                                                                        <label for="kelas">{{$pmb->Siswa->Kelas->nama}}</label>
                                                                        <hr>
                                                                        <h6>DiVerifikasi Oleh</h6>
                                                                        <label for="petugas">{{$pmb->Petugas->nama}}</label>
                                                                    </div>
                                                                    <div class="col-md-6" style="text-align:left;">
                                                                        <br>
                                                                        <h6>Status</h6>
                                                                        <span class="badge badge-success">Lunas</span>
                                                                        <hr>
                                                                        <h6>Tanggal Pembayaran</h6>
                                                                        <label for="tgl">{{$pmb->tgl_pembayaran}}</label>
                                                                        <hr>
                                                                        <h6>Untuk Pembayaran</h6>
                                                                        <label for="">Kelas {{$pmb->Spp->Jenjang->kelas}} Semester {{$pmb->Spp->Jenjang->semester}}<br>{{$pmb->Tapel->dari}}/{{$pmb->Tapel->sampai}}<br>Rp. {{number_format($pmb->biaya, 2, ',', '.')}}</label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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