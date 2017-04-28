<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable = [
    'name','description', 'images', 'price', 'start_date','end_date','status','id_user','id_images','id_category'
  ];
  public function user(){
    return $this->belongsTo('handy/User', 'id_user');
  }
  public function reciver(){
    return $this->belongsTo('handy/Image', 'id_images');
  }
  public function item(){
    return $this->belongsTo('handy/Category', 'id_category');
  }
  public function userItem(){
    return $this->hasOne('handy/Item', 'id_user');
  }
}
