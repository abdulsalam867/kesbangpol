<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbup extends Model
{
    use HasFactory;

    protected $fillable = ['nomor','tahun','tentang','file'];

    protected $table = 'perbup';
}
