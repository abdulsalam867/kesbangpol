<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    protected $table = 'category';

    protected $guarded = [];

    public function posts()
    {
    	return $this->hasMany('App\Models\Posts');
    }

    public function informasi()
    {
    	return $this->hasMany('App\Models\Informasi');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
