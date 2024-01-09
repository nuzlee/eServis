<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenama extends Model
{
    protected $table = 'ref_jenama';
    protected $primaryKey = 'id';
    protected $fillable = [
    'jenama'

    ];
    use HasFactory;
}
