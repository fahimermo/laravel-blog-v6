<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function comments(){
    	return $this->hasMany('App\Comment','post_id');
    }

    public function counter()
 {
    return $this->hasOne('Counter');
 }

}
