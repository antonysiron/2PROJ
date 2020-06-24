<?php

namespace App\Http\Middleware;

use App\UserAnswerSurvey;
use Closure;

class CheckSurveyAlreadyAnswered
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
        $user_answer_survey = UserAnswerSurvey::all()
            ->where('user_id', '=', auth()->user()->id)
            ->where('survey_id', '=', $request->id);
        if($user_answer_survey->count()>0 && $user_answer_survey[0]->answer_status == 'FINISHED')
        {
            $msg = " Error : You already answered this survey";
            return redirect()->route('surveys.view', ['id'=>$request->id])->with('msg', $msg);
        }
        return $next($request);
    }
}
