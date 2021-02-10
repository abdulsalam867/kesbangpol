<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Albums extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','cover_image'];

    protected $table = 'albums';

    public function photos()
    {
    	return $this->hasMany('App\Models\Photos');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
