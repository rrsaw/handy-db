<?php

namespace handy;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birthday', 'email', 'phone_number', 'password', 'id_address', 'id_profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function address(){
      return $this->belongsTo('handy/Address', 'id_address');
    }
    public function profileImage(){
      return $this->belongsTo('handy/Image', 'id_profile_image');
    }
    public function ownerReview(){
      return $this->hasOne('handy/Review', 'id_owner');
    }
    public function reviwerReview(){
      return $this->hasOne('handy/Review', 'id_reviewer');
    }
    public function ownerLoans(){
      return $this->hasOne('handy/Loan', 'id_owner');
    }
    public function reviwerLoans(){
      return $this->hasOne('handy/Loan', 'id_reviewer');
    }
    public function userItem(){
      return $this->hasOne('handy/Item', 'id_user');
    }
}
