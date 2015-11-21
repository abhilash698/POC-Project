<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackCustomers extends Model
{
    protected $table = 'feedback_customers';
    protected $fillable = ['form_id'];

    public function form()
    {
        return $this->belongsTo('App\StoreFeedbackForms','form_id','id');
    }

    public function feedbackValues(){
    	return $this->hasMany('App\FeedbackValues','customer_id');
    }
}
