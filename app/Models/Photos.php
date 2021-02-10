<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $fillable = [
        'albums_id', 'photo'
    ];

    public function album()
    {
    	return $this->belongsTo('App\Models\Albums');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
