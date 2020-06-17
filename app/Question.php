<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['question', 'choices', 'rating_scale', 'question_type'];

    public function results() {
        return $this->belongsTo('App\Survey','survey_id');
    }
}
