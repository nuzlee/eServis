<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refMinyak extends Model
{
    protected $table = 'minyak';
    protected $primaryKey = 'id';
    protected $fillable = [
    'jenis'

];

public function getKenderaan()
    {
        return $this->belongsTo(Kenderaan::class, 'kenderaan','id');
        //**menghubungkan kenderaan & id
    }
}
