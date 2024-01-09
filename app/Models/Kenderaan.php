<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenderaan extends Model
{
    protected $table = 't_kenderaan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'jenis',
    'jenama',
    'model'

];

    use HasFactory;



public function paparRelationMinyak(){
    return $this->hasOne('App\Models\Minyak','kenderaan','id');


}
}
