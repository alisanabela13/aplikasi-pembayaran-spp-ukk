@extends('layouts.partials.app')
@section('title')
    Bayar SPP
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Bayar SPP</h1>
            </div>
            <div class="section-body">
                @include('layouts.flash-alert')
                <div class="card">
                    <div class="card-header">
                      <h4>Form Upload Bukti Pembayaran SPP</h4>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{route('siswa.bayar')}}" method="POST" enctype="multipart/form-data" novalidate="" class="needs-validation">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_spp">Untuk Pembayaran</label>
                                        <select name="id_spp" id="id_spp" class="form-control" required>
                                            <option value='' disabled selected>- Pilih -</option>
                                            @foreach ($spp as $espp)
                                                <option value="{{$espp['id']}}">Kelas {{$espp->Jenjang->kelas}} Semester {{$espp->Jenjang->semester}} - Rp. {{number_format($espp->nominal, 2, ',', '.')}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_tapel">Tahun Ajaran</label>
                                        <select name="id_tapel" id="id_tapel" class="form-control" required>
                                            <option value="" disabled selected>- Pilih -</option>
                                            @foreach ($tapel as $tpl)
                                                <option value="{{$tpl['id']}}">{{$tpl->dari}}/{{$tpl->sampai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bukti_pembayaran">Foto Bukti Pembayaran<small> (Slip Pembayaran Dari Bank)</small></label>
                                        <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" required id="bukti_pembayaran" name="bukti_pembayaran" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                                        <input type="date" class="form-control" required id="tgl_pembayaran" name="tgl_pembayaran" value="">
                                    </div>
                                </div>
                            </div>
                            <button class="btn text-white" type="submit" style="background-color: #540b0e">Upload Data</button>
                        </form>
                    </div>
                  </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

    $("#bukti_pembayaran").change(function () {
        readURL(this);
    });

</script>
@endsection