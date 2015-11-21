<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackValues extends Model
{
    protected $table = 'feedback_values';
    protected $fillable = ['element_id','customer_id','value'];

    public function formElement()
    {
        return $this->belongsTo('App\StoreFeedbackForms','element_id','id');
    }

    public function customer()
    {
        return $this->belongsTo('App\FeedbackCustomers','customer_id','id');
    }
}
