<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
    'start_date','end_date','loan_confirmation','return_confirmation','id_owner','id_receiver','id_item'
  ];
    public function owner()
    {
        return $this->belongsTo('handy\User', 'id_owner');
    }
    public function receiver()
    {
        return $this->belongsTo('handy\User', 'id_receiver');
    }
    public function review()
    {
        return $this->belongsTo('handy\Review', 'id_item');
    }
}
