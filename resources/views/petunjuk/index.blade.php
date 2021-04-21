@extends('layouts.partials.app')
@section('title')
    Petunjuk Pembayaran
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Petunjuk Pembayaran</h1>
            </div>
        </section>
        @include('layouts.flash-alert')
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Petunjuk Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('petunjuk.update')}}" method="POST" id="form-petunjuk">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{$petunjuk->judul}}" required>
                                @error('judul')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea name="isi" id="summernote" style="height: 100px;" >{{$petunjuk->isi}}</textarea required>
                                @error('isi')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn text-white" style="background-color: #540b0e;">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        {{-- </section> --}}
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300
    });
});

$('#form-petunjuk').on('submit', function(e) {
  
  if($('#summernote').summernote('isEmpty')) {
    console.log('contents is empty, fill it!');

    // cancel submit
    e.preventDefault();
  }
  else {
    // do action
  }
})
</script>
@endsection