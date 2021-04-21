@extends('layouts.partials.app')
@section('title')
    Data Siswa
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Siswa</h1>
            </div>
        </section>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Siswa</h4>
                                    <div class="card-header-action">
                                        <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                            <a href="{{route('siswa.create')}}" class="btn btn-sm text-white" style="background-color: #540b0e" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-striped table-bordered" id="table-index" style="width: 100%; text-align: center;">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>NISN</td>
                                                    <td>Nama</td>
                                                    <td>Kelas</td>
                                                    <td>Prodi</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa as $sws)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$sws->nisn}}</td>
                                                        <td>{{$sws->nama}}</td>
                                                        <td>{{$sws->Kelas->nama}}</td>
                                                        <td>{{$sws->Kelas->Prodi->nama_prodi}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-primary text-white" type="button" data-toggle="modal" data-target=".bs-example-modal-lg-{{$sws->id}}" title="Detail Data">
                                                                    <i class="fa fa-info px-1"></i>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <a href="{{route('siswa.edit', ['id' => $sws["id"]])}}" class="btn btn-sm btn-info text-white" type="submit" title="Edit Data">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form action="{{route('siswa.destroy', $sws['id_user'])}}" method="post" class="delete_form">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger btn-delete" title="Hapus Data">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- modal --}}
                                                 <div class="modal fade bs-example-modal-lg-{{$sws->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="text-align: left;">
                                                                        <h6>Nama</h6>
                                                                        <label for="">{{$sws->nama}}</label>
                                                                        <hr>
                                                                        <h6>NISN</h6>
                                                                        <label for="">{{$sws->nisn}}</label>
                                                                        <hr>
                                                                        <h6>NIS</h6>
                                                                        <label for="">{{$sws->nis}}</label>
                                                                        <hr>
                                                                        <h6>Awal masuk</h6>
                                                                        <label for="">Kelas {{$sws->Jenjang->kelas}} Semester {{$sws->Jenjang->semester}}</label>
                                                                        <hr>
                                                                        <h6>Prodi</h6>
                                                                        <label for="">{{$sws->Kelas->Prodi->nama_prodi}}</label>
                                                                        <hr>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-6" style="text-align:left;">
                                                                        <h6>Kelas</h6>
                                                                        <label for="">{{$sws->Kelas->nama}}</label>
                                                                        <hr>
                                                                        <h6>Status</h6>
                                                                        <label for="">
                                                                            @if ($sws->status === 'Aktif')
                                                                                <span class="badge badge-success">{{$sws->status}}</span>
                                                                            @else
                                                                            <span class="badge badge-dark">{{$sws->status}}</span>
                                                                            @endif
                                                                        </label>
                                                                        <hr>
                                                                        <h6>No Telpon</h6>
                                                                        <label for="">{{$sws->no_tlp}}</label>
                                                                        <hr>
                                                                        <h6>E-Mail</h6>
                                                                        <label for="">{{$sws->User->email}}</label>
                                                                        <hr>
                                                                        <h6>Username</h6>
                                                                        <label for="">{{$sws->User->username}}</label>
                                                                        <hr>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12" style="text-align: left">
                                                                        <h6>Alamat</h6>
                                                                        <label for="">{{$sws->alamat}}</label>
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