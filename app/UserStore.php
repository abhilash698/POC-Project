<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    protected $table = 'user_store';
    protected $fillable = ['user_id', 'store_name', 'city'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function FeedBackForms()
    {
        return $this->hasMany('App\StoreFeedbackForms','store_id');
    }

}
