<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href={{asset('assets/css/style.css')}}>
<link rel="stylesheet" href={{asset('assets/css/components.css')}}>
<div class="container" style="width: 60% !important; text-align: center;">
<h1>Data Pembayaran SPP Siswa</h1>
    <div class="content-body table">
        <div class="table-responsive">
            <table class="display table-striped table-bordered" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>PEMBAYARAN</th>
                        <th>TAHUN AJARAN</th>
                        <th>STATUS</th>
                        <th>DIVERIFIKASI<br>Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $pmb)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$pmb->Siswa->nisn}}</td>
                            <td>{{$pmb->Siswa->nama}}</td>
                            <td>{{$pmb->Siswa->Kelas->nama}}</td>
                            <td>Kelas {{$pmb->Spp->Jenjang->kelas}} Semester {{$pmb->Spp->Jenjang->semester}}<br>Rp. {{number_format($pmb->Spp->nominal, 2, ',', '.')}}</td>
                            <td>{{$pmb->Tapel->dari}}/{{$pmb->Tapel->sampai}}</td>
                            <td>{{$pmb->status}}</td>
                            <td>{{$pmb->Petugas->nama}}<br><small>NIK: {{$pmb->Petugas->nik}}</small></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.print();
</script>