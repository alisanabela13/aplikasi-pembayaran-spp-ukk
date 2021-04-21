<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'id_siswa',
        'id_petugas',
        'id_spp',
        'id_tapel',
        'biaya',
        'kelas',
        'bukti_pembayaran',
        'tgl_pembayaran',
        'status'
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function Petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function Spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function Tapel()
    {
        return $this->belongsTo(Tapel::class, 'id_tapel');
    }
}
