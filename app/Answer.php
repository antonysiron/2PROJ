<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['closed_ended', 'open_ended', 'numerical', 'rating', 'multiple_choice', 'answer_type'];
}
