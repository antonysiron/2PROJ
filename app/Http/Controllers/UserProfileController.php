<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Profile Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the update of users profile.
    |
    */

    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        User::where('id',$user_id) ->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
        ]);
        return redirect()->back()
            ->with('message','Profile updated successfully');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    /**
    protected function store(array $data)
    {
        $user_id = auth()->user()->id;
        User::where('id',$user_id) ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->back()
            ->with('message','Profile updated successfully');
    }
     **/
}
