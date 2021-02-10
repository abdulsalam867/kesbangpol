<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormas extends Model
{
    use HasFactory;

    protected $table = 'ormas';

    protected $fillable = [
    	'no_surat','nama','alamat','telpon','status','file'
    ];
}
