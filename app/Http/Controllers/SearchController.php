<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($search_value)
    {
        $surveys = array();
        $results = Survey::all()->where('status_survey', '=', 'PUBLISHED');
        foreach ($results as $result) {
            if(strpos(strtolower(' '.$result->name), strtolower($search_value)) || strpos(strtolower(' '.$result->description), strtolower($search_value)) || strpos(strtolower(' '.$result->category), strtolower($search_value)))
                array_push($surveys, $result);
        }
        return view('search', ['surveys'=>$surveys, 'search_value'=>$search_value]);
    }
}
