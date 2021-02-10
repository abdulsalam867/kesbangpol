<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiBagian extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    protected $table = 'tupoksi_bagian';
}
