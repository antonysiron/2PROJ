<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswerSurvey extends Model
{
    protected $table = 'users_answer_surveys';
    protected $fillable = ['answer_status', 'last_question_nb'];
}
