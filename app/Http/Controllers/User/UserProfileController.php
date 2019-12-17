<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\Http\Controllers\Controller;
use App\Nationality;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function showProfile(){
        $user_id = Auth::id();
        $user    = User::find($user_id);

        $countries     = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $nationalities = Nationality::all()->pluck('country_enNationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.user.profile',compact('user','countries','nationalities'));
}
}
