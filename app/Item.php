<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    'name','description', 'price', 'start_date','end_date','status','id_user','id_category'
  ];
    public function user()
    {
        return $this->belongsTo('handy\User', 'id_user');
    }
    public function category()
    {
        return $this->belongsTo('handy\Category', 'id_category');
    }
    public function images()
    {
        return $this->hasMany('handy\Image', 'id_item');
    }
    public function loan()
    {
        return $this->hasMany('handy\Loan', 'id_item');
    }
}
