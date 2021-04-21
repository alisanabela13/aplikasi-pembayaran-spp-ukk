@extends('layouts.partials.app')
@section('title')
    Tindak
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Tindak Pembayaran</h1>
            </div>
        </section>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                      <h4>Tindak Pembayaran SPP</h4>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <a href={{ asset('bukti/'.$pembayaran->bukti_pembayaran) }}><img src="{{ asset('bukti/'.$pembayaran->bukti_pembayaran) }}" alt="" style="width:50%; height: 220px;"></a>
                            </div>
                            <div class="col-md-6" style="text-align: left;">
                                <br>
                                <h6>Nama Siswa</h6>
                                <label for="nama">{{$pembayaran->Siswa->nama}}</label>
                                <hr>
                                <h6>NISN</h6>
                                <label for="nisn">{{$pembayaran->Siswa->nisn}}</label>
                                <hr>
                                <h6>Kelas</h6>
                                <label for="kelas">{{$pembayaran->Siswa->Kelas->nama}}</label>
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <br>
                                <h6>Tanggal Pembayaran</h6>
                                <label for="tgl">{{$pembayaran->tgl_pembayaran}}</label>
                                <hr>
                                <h6>Biaya</h6>
                                <label for="biaya">Rp. {{number_format($pembayaran->biaya, 2, ',', '.')}}</label>
                                <hr>
                                <h6>Untuk Pembayaran</h6>
                                <label for="">Kelas {{$pembayaran->Spp->Jenjang->kelas}} Semester {{$pembayaran->Spp->Jenjang->semester}}<br>{{$pembayaran->Tapel->dari}}/{{$pembayaran->Tapel->sampai}}</label>
                                <br><br>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <div class="btn-group">
                                <form action="{{route('verif.lunas', ['id' => $pembayaran->id])}}" method="POST" enctype="multipart/form-data" novalidate="" class="needs-validation form-verif">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button class="btn btn-success" id="btn-verif" type="submit">Lunas</button> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                </form>
                            </div>
                            <div class="btn-group">
                                <a href="" class="btn btn-danger"  data-toggle="modal" data-target=".bd-example-modal-sm"  type="submit" >Tolak</a>
                            </div>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Note</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" >
                                            <form action="{{route('verif.tolak', ['id' => $pembayaran->id])}}" method="POST" enctype="multipart/form-data" novalidate="" class="needs-validation form-verif">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="note" id="note" type="text" class="form-control" required value="{{old('note')}}" style="height: 180px;"></textarea>
                                                        @error('note')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger" id="btn-verif" type="submit">Tolak</button>
                                            </form>
                                        </div>
                                    </div>
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
