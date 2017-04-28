<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = [
    'description', 'value', 'date','id_owner','id_reviewer','id_item'
  ];
  public function owner(){
    return $this->belongsTo('handy/User', 'id_owner');
  }
  public function reciver(){
    return $this->belongsTo('handy/User', 'id_reciver');
  }
  public function item(){
    return $this->belongsTo('handy/User', 'id_item');
  }
}
