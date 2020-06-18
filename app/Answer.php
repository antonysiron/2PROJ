<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['closed-ended', 'open-ended', 'numerical', 'rating', 'multiple_choice', 'answer_type'];
}
