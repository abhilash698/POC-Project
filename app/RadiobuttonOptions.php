<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiobuttonOptions extends Model
{
    protected $table = 'radiobutton_options';
    protected $fillable = ['element_id', 'option'];

    public function FormElement()
    {
        return $this->belongsTo('App\FeedbackFormElements','element_id','id');
    }
}
