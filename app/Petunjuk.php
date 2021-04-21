<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petunjuk extends Model
{
    protected $table = 'petunjuks';

    protected $fillable = [
        'judul',
        'isi'
    ];
}
