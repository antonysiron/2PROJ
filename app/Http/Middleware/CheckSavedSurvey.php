<?php

namespace App\Http\Middleware;

use App\Survey;
use Closure;

class CheckSavedSurvey
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
        if(Survey::find($request->id)->status_survey == 'SAVED')
            return $next($request);
        $msg = " Error : You cannot update a published survey";
        return redirect()->route('surveys.index')->with('msg', $msg);
    }
}
