<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{

    protected $table = 't_pemandu';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama',
    'ic',
    'kenderaan'
];

public function getKenderaan()
    {
        return $this->belongsTo(Kenderaan::class, 'kenderaan','id');
        //**menghubungkan kenderaan & id
    }

}
