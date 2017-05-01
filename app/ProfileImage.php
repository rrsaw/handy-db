<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
  protected $fillable = [
    'name'
  ];
  public function user(){
    return $this->hasOne('handy/User', 'id_profile_image');
  }
}
