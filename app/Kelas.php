<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'id_prodi'
    ];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}
