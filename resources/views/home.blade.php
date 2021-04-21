@extends('layouts.partials.app')
@section('title')
  Dasbor
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Dasbor</h1>
            </div>
            @if (auth()->user()->role === "Admin")
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Siswa</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($siswa)}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Petugas</h4>
                      </div>
                      <div class="card-body">
                        <h6><small>Admin : <b>{{number_format($admin)}}</b> <br>
                        Petugas : <b>{{number_format($petugas)}}</b></small></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Belum Terverifikasi</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($pembayaran)}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pembayaran Hari ini</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($bayarhariini)}}
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="row">
                  
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon " style="background-color: #006466">
                        <i class="fas fa-align-justify"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Prodi</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($prodi)}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Kelas</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($kelas)}}
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>
            @elseif(auth()->user()->role === "Petugas")
            
              <div class="row">
                  
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pembayaran Belum Terverifikasi</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($pembayaran)}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pembayaran Hari Ini</h4>
                      </div>
                      <div class="card-body">
                        {{number_format($bayarhariini)}}
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>
            @else 
            <div class="card">
              <div class="card-header">
                <h4>{{$petunjuk->judul}}</h4>
              </div>
              <div class="card-body p-3">
                {!!$petunjuk->isi!!}
              </div>
            </div>
              <div class="card">
                <div class="card-header">
                  <h4>Biaya SPP</h4>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="display table-striped table-bordered" style="width: 100%; text-align: center;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenjang</th>
                          <th>Biaya</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($spp as $espp)
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>Kelas {{$espp->Jenjang->kelas}} Semester {{$espp->Jenjang->semester}}</td>
                              <td>Rp. {{number_format($espp->nominal, 2, ',', '.')}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            @endif
        </section>
    </div>
</div>        
@endsection