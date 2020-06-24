<?php

namespace App\Http\Middleware;

use App\Survey;
use Closure;

class CheckPublishedSurvey
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
        if(Survey::find($request->id)->status_survey == 'PUBLISHED')
            return $next($request);
        $msg = " Error : This survey is not public";
        return redirect()->route('surveys.index')->with('msg', $msg);
    }
}
