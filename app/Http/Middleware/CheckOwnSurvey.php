<?php

namespace App\Http\Middleware;

use App\Survey;
use Closure;

class CheckOwnSurvey
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Survey::find($request->id)->creator_id == auth()->user()->id)
            return $next($request);
        $msg = " Error : You do not own this survey";
        return redirect()->route('surveys.index')->with('msg', $msg);
    }
}
