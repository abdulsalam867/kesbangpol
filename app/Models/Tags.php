<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    protected $table = 'tags';

    public function posts()
    {
    	return $this->belongsToMany('App\Models\Posts');
    }

    public function informasi()
    {
    	return $this->belongsToMany('App\Models\Informasi');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
