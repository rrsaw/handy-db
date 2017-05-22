<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
    'name'
  ];
  public function user(){
    return $this->belongsTo('handy\Item', 'id_item');
  }
}
