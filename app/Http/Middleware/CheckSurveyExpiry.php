<?php

namespace App\Http\Middleware;

use App\Survey;
use Carbon\Carbon;
use Closure;

class CheckSurveyExpiry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $surveys = Survey::all();
        foreach($surveys as $survey)
        {
            if($survey->expiration_date != null && $survey->status_survey == 'PUBLISHED' && $survey->expiration_date < Carbon::now()->toDateString())
            {
                $survey->status_survey = 'FINISHED';
                $survey->save();
            }
        }
        return $next($request);
    }
}
