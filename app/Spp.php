<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spps';

    protected $fillable = [
        'id_jenjang',
        'nominal'
    ];

    public function Jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang');
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_spp');
    }

}
