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
        if($this->validator($request))
        {
            User::where('id', $user_id)
            ->update([
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>Hash::make(request('new-password')),
            ]);
            return redirect()->back()
                ->with('message','Profile updated successfully');
        }

    }

    protected function validator(Request $data)
    {
        return $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'new-password' => ['required', 'confirmed', 'string', 'min:8']
        ]);
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
