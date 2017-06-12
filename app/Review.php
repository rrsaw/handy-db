<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    'description', 'value', 'date','id_loan','id_owner','id_reviewer','id_item'
  ];
    public function loan()
    {
        return $this->belongsTo('handy\Loan', 'id_loan');
    }
    public function owner()
    {
        return $this->belongsTo('handy\User', 'id_owner');
    }
    public function reviewer()
    {
        return $this->belongsTo('handy\User', 'id_reviewer');
    }
    public function item()
    {
        return $this->belongsTo('handy\User', 'id_item');
    }
}
