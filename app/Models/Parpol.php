<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parpol extends Model
{
    use HasFactory;

    protected $table = 'parpol';

    protected $fillable = [
    	'no_surat','nama','alamat','telpon','status','file'
    ];
}
