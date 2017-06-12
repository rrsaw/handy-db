<?php

namespace handy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;

    protected $table = 'loans';
    protected $dates = ['deleted_at','start_date','end_date'];
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
    public function item()
    {
        return $this->belongsTo('handy\Item', 'id_item');
    }
    public function review()
    {
        return $this->hasOne('handy\Review', 'id_loan');
    }
}
