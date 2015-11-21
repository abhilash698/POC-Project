<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackFormElements extends Model
{
    protected $table = 'feedback_form_elements';
    protected $fillable = ['form_id', 'type', 'title'];

    public function FeedbackForm()
    {
        return $this->belongsTo('App\StoreFeedbackForms','form_id','id');
    }

    public function RadiobuttonOptions()
    {
        return $this->hasMany('App\RadiobuttonOptions','element_id');
    }
}
