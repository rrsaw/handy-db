<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
  protected $fillable = [
    'start_date','end_date','loan_confermation','return_confermation','id_owner','id_reciver','id_item'
  ];
  public function owner(){
    return $this->belongsTo('handy\User', 'id_owner');
  }
  public function reciver(){
    return $this->belongsTo('handy\User', 'id_reciver');
  }
  public function review(){
    return $this->belongsTo('handy\Review', 'id_item');
  }
}
