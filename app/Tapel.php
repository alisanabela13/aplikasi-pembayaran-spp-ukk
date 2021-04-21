<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tapel extends Model
{
    protected $table = 'tapels';

    protected $fillable = [
        'dari',
        'sampai'
    ];

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_tapel');
    }

}
