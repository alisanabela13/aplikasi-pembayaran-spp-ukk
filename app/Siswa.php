<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $table = 'siswas';

    protected $fillable = [
        'id_user',
        'nisn',
        'nis',
        'nama',
        'id_jenjang',
        'id_kelas',
        'alamat',
        'no_tlp',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }

}
