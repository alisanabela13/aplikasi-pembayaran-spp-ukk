@extends('layouts.partials.app')
@section('title')
    Data Petugas
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Petugas</h1>
            </div>
        </section>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Petugas</h4>
                                    <div class="card-header-action">
                                        <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                            <a href="{{route('petugas.create')}}" class="btn btn-sm text-white" title="Tambah Data" style="background-color: #540b0e;"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-striped table-bordered" id="table-index" style="width: 100%; text-align: center;">
                                            <thead> 
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIK</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Posisi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($petugas as $ptgs)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$ptgs->nik}}</td>
                                                    <td>{{!!$ptgs->nip ? $ptgs->nip: '-'}}</td>
                                                    <td>{{$ptgs->nama}}</td>
                                                    <td>
                                                        @if ($ptgs->User->role === 'Admin')
                                                            <span class="badge badge-warning">{{$ptgs->User->role}}</span>
                                                        @else
                                                            <span class="badge badge-success">{{$ptgs->User->role}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (auth()->user()->id === $ptgs->User->id)
                                                            saya
                                                        @elseif($ptgs->User->role === 'Admin')
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-primary text-white" type="button" data-toggle="modal" data-target=".bs-example-modal-lg-{{$ptgs->id}}" title="Detail data"><i class="fa fa-info px-1"></i></a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form action="{{route('petugas.destroy', $ptgs['id_user'])}}" method="post" class="delete_form">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger btn-delete" title="Hapus Data"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        @else
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-primary text-white" type="button" data-toggle="modal" data-target=".bs-example-modal-lg-{{$ptgs->id}}" title="Detail data"><i class="fa fa-info px-1"></i></a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <a href="{{route('petugas.edit', ['id' => $ptgs["id"]])}}" class="btn btn-sm btn-info text-white" type="submit" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form action="{{route('petugas.destroy', $ptgs['id_user'])}}" method="post" class="delete_form">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger btn-delete" title="Hapus Data"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>

                                                 {{-- modal --}}
                                                 <div class="modal fade bs-example-modal-lg-{{$ptgs->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Detail Data Petugas</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="text-align: left;">
                                                                        <h6>Nama</h6>
                                                                        <label for="">{{$ptgs->nama}}</label>
                                                                        <hr>
                                                                        <h6>Posisi</h6>
                                                                        @if ($ptgs->User->role === 'Admin')
                                                                            <span class="badge badge-warning">{{$ptgs->User->role}}</span>
                                                                        @else 
                                                                            <span class="badge badge-success">{{$ptgs->User->role}}</span>
                                                                        @endif
                                                                        <hr>
                                                                        <h6>NIK</h6>
                                                                        <label for="">{{$ptgs->nik}}</label>
                                                                        <hr>
                                                                        <h6>NIP</h6>
                                                                        <label for="">{{!!$ptgs->nip ? $ptgs->nip : '-'}}</label>
                                                                    </div>
                                                                    <div class="col-md-6" style="text-align:left;">
                                                                        <h6>No Telpon</h6>
                                                                        <label for="">{{$ptgs->no_tlp}}</label>
                                                                        <hr>
                                                                        <h6>E-Mail</h6>
                                                                        <label for="">{{$ptgs->User->email}}</label>
                                                                        <hr>
                                                                        <h6>Username</h6>
                                                                        <label for="">{{$ptgs->User->username}}</label>
                                                                        <hr>
                                                                        <h6>Alamat</h6>
                                                                        <label for="">{{$ptgs->alamat}}</label>
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
        
    </div>
</div>
@endsection

