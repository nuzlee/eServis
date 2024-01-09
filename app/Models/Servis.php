<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 't_servis';
    protected $primaryKey = 'id';
    protected $fillable = [
    'kenderaan',
    'odometer',
    'tarikh',
    'harga'

    ];

    /* menghubungkan data dari table kenderaan */

    public function getKenderaan()
    {
        return $this->belongsTo(Kenderaan::class, 'kenderaan','id');
    }

}
