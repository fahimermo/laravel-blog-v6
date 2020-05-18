<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//class Counter extends Model
//{
    
//}

class Counter extends Eloquent {

    protected $table = 'counter';

    public function post()
    {
        return $this->belongsTo('Post');
    {
}

