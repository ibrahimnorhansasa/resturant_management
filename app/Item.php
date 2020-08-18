<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
     protected $table='items';
     protected $fillable = [
        'title', 'description','status','price','menu_id','user_id','image'
    ];
    public function user(){
        return $this->belongsTo('Bitfumes\Multiauth\Model\Admin');
    }
      public function menu(){
        return $this->belongsTo('App\Menu');
    }
      public function meals(){
        return $this->belongsToMany('App\Meal','meal_items','meal_id','item_id');
    }
       public function orders(){
        return $this->belongsToMany('App\Order','order_item','order_id','item_id');
    }
}
