@extends('layouts.partials.app')
@section('title')
    Prodi
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Prodi</h1>
            </div>
        </section>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Prodi</h4>
                                    <div class="card-header-action">
                                        <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                            <a href="" class="btn btn-sm text-white" style="background-color: #540b0e" data-target=".bs-example-modal-lg-" data-toggle="modal">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- modal tambah --}}
                                <div class="modal fade bs-example-modal-lg-" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('prodi.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Ajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pb-2">
                                                {{ csrf_field() }}
                                                    <div class="form-group mb-0">
                                                        <label for="recipient-name" class="col-form-label">Nama Prodi</label>
                                                        <input type="text" class="form-control" required id="recipient-name" name="nama_prodi" value="{{ old('nama_prodi') }}" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn text-white" style="background-color: #540b0e;" type="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-striped table-bordered" id="table-index" style="width: 100%; text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Prodi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($prodi as $prd)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$prd->nama_prodi}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-info text-white" type="submit" data-toggle="modal" data-target=".bs-example-modal-lg-{{$prd->id}}"title="Edit Data">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form action="{{route('prodi.destroy', $prd['id'])}}" method="POST" class="delete_form">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger btn-delete" title="Hapus Data">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        {{-- modal edit --}}
                                                        <div class="modal fade bs-example-modal-lg-{{$prd->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Prodi</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('prodi.update', ['id' => $prd->id])}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                                                    <div class="modal-body pb-2">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="form-group mb-0">
                                                                            <label for="nama_prodi" class="col-form-label">Nama Prodi</label>
                                                                            <input type="text" class="form-control" required id="nama_prodi" name="nama_prodi" value="{{$prd->nama_prodi}}" >
                                                                        </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn text-white " type="submit" style="background-color: #540b0e">Simpan Perubahan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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