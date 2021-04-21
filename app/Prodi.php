<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodis';

    protected $fillable = [
        'nama_prodi'
    ];

    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'id_prodi');
    }
}
