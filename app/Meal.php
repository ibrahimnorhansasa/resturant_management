<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table='meals';
    protected $fillable = [
        'title', 'description','status','price','user_id','image'
    ];
      public function items(){
        return $this->belongsToMany('App\Item','meal_items','meal_id','item_id');
    }
      public function user(){
        return $this->belongsTo('Bitfumes\Multiauth\Model\Admin');
    }
}
