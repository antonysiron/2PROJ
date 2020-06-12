<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name','category', 'description', 'duration'];

    public function results() {
        return $this->belongsToMany('App\User','survey_user','survey_id','user_id')
            ->withPivot('status')
            ->withTimestamps();
    }
}
