<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey ='id_artikel';


    protected $fillable = [
        'judul',
        'isi',
        'foto',
    ];
}
