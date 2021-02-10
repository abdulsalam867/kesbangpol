<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'posts';

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
