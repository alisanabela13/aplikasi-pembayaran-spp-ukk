@extends('layouts.partials.app')
@section('title')
    SPP
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>SPP</h1>
            </div>
        </section>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data SPP</h4>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-striped table-bordered" id="table-index" style="width: 100%; text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Jenjang</th>
                                                    <th>Biaya</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($spp as $espp)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>Kelas {{$espp->Jenjang->kelas}} Semester {{$espp->Jenjang->semester}}</td>
                                                        <td>Rp. {{number_format($espp->nominal, 2, ',', '.')}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="" class="btn btn-sm btn-info text-white" type="submit" data-toggle="modal" data-target=".bs-example-modal-lg-{{$espp->id}}"title="Edit Data">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        {{-- modal edit --}}
                                                        <div class="modal fade bs-example-modal-lg-{{$espp->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Biaya SPP</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('spp.update', ['id' => $espp->id])}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                                                    <div class="modal-body pb-2">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                            <div class="form-group mb-0">
                                                                                <label for=""><h6>Jenjang : Kelas {{$espp->Jenjang->kelas}} Semester {{$espp->Jenjang->semester}}</h6></label>
                                                                            </div>
                                                                            <div class="form-group mb-0">
                                                                                <label for="nominal">Biaya</label>
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                                                    <input type="number"  required class="form-control" id="nominal" name="nominal" value="{{$espp->nominal}}">
                                                                                </div>
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