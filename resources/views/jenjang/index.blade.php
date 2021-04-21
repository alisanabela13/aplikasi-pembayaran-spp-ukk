@extends('layouts.partials.app')
@section('title')
    Jenjang
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Jenjang</h1>
            </div>
        </section>
            <div class="section-body">
                <div class="content-body table">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data jenjang</h4>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table class="display table-striped table-bordered" id="table-index" style="width: 100%; text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Jenjang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jenjang as $jjg)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>Kelas {{$jjg->kelas}} Semester {{$jjg->semester}}</td>
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