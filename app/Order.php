<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table='orders';
     protected $fillable = [
        'total_price','user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
      public function items(){
        return $this->belongsToMany('App\Item','order_item','order_id','item_id');
    }
}
