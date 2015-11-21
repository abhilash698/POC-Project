<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreFeedbackForms extends Model
{
    protected $table = 'store_feedback_forms';
    protected $fillable = ['store_id', 'form_name'];

    public function store()
    {
        return $this->belongsTo('App\UserStore','store_id','id');
    }

    public function FormElements()
    {
        return $this->hasMany('App\FeedbackFormElements','form_id');
    }
}
