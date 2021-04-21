<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    protected $table = 'jenjangs';

    protected $fillable = [
        'kelas',
        'semester'
    ];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'id_jenjang');
    }

    public function Spp()
    {
        return $this->hasOne(Spp::class, 'id_jenjang');
    }

    
}
