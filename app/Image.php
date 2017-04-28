<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
    'name'
  ];
  public function user(){
    return $this->hasOne('handy/User', 'id_profile_image');
  }
  public function item(){
    return $this->hasOne('handy/Item', 'id_images');
  }
}
