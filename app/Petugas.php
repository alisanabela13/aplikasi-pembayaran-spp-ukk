<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'id_user',
        'nama',
        'nip',
        'nik',
        'alamat',
        'no_tlp'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas');
    }

    
}
