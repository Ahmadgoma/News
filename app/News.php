<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
	protected $fillable = [
        'title', 'description', 'author',
    ];
    public function images(){
    	return $this->hasMany('App\Image');
    }
}
