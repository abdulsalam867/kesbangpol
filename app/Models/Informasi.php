<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $fillable = [
        'title', 'content', 'users_id', 'category_id', 'slug', 'gambar'
    ];

    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tags');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
