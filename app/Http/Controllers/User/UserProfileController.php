<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\Experience;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Nationality;
use App\User;
use App\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $experience = Experience::where('user_id', $user_id)->first();
        $destination_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $expected_industries = Industry::all()->pluck('name', 'id');
        $indurstries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $visas = Visa::all()->pluck('name', 'id');
        $profile_picture = $user->getMedia('profile_picture')->first() ? $user->getMedia('profile_picture')->first()->getUrl() : '';
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $nationalities = Nationality::all()->pluck('country_enNationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.user.profile', compact('user', 'experience', 'countries', 'destination_countries', 'indurstries', 'expected_industries', 'visas', 'nationalities', 'profile_picture'));
    }

    public function updateBasicInformation(Request $request) {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->nationality_id= $request->nationality_id;
        $user->country_id= $request->country_id;
        $user->city= $request->city;
        $user->save();
        return redirect()->back()->with('message', 'The information has been updated successfully!');;


    }
}



