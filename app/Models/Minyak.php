<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minyak extends Model
{
    protected $table = 't_minyak';
    protected $primaryKey = 'id';
    protected $fillable = [
    'jenis',
    'kuantiti',
    'kenderaan',
    'tarikh',
    'harga'

    ];

    public function getKenderaan()
    {
        return $this->belongsTo(Kenderaan::class, 'kenderaan','id');
    }
}

//     public function paparRelationKenderaan(){
//         return $this->hasOne('App\Models\Kenderaan','id','kenderaan');
//     }
// }
