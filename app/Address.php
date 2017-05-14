<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = [
    'street', 'civic_number', 'city', 'coutry', 'latitude', 'longitude'
  ];
  public function user(){
    return $this->hasOne('handy/User', 'id_address');
  }
}
