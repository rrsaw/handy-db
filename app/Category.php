<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'name', 'icon'
  ];
  public function item(){
    return $this->hasOne('handy\Item', 'id_category');
  }
}
