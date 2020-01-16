<?php

namespace App\Http\Controllers\User;

use App\Agent;
use App\Country;
use App\Employer;
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
        $expected_industries = Industry::all()->pluck('name', 'id');
        $visas = Visa::all()->pluck('name', 'id');
        $profile_picture = $user->getMedia('profile_picture')->first() ? $user->getMedia('profile_picture')->first()->getUrl() : '';
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $nationalities = Nationality::all()->pluck('country_enNationality', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $experience->load('user', 'agent', 'destination_country', 'employer', 'industry');

        return view('frontend.user.profile', compact('user', 'agents', 'users', 'experience', 'countries', 'destinations', 'industries', 'employers', 'expected_industries', 'visas', 'nationalities', 'profile_picture'));
    }

    public function updateBasicInformation(Request $request)
    {

//        $request->validate([
//            'email' => 'email|required|unique:users',
//
//        ]);

        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->nationality_id = $request->nationality_id;
        $user->country_id = $request->country_id;
        $user->city = $request->city;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->education_level = $request->education_level;
        $user->language_level = $request->language_level;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->facebook = $request->facebook;
        $user->skype = $request->skype;
        $user->save();

        return redirect()->back()->with('message', 'The information has been updated successfully!');

    }

    public function updateWorkPreference(Request $request) {

        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->destination_area    = $request->destination_area;
        $user->expected_industries()->sync($request->input('expected_industries', []));
        $user->expected_salary     = $request->expected_salary;
        $user->date_of_leaving     = $request->date_of_leaving;
        $user->save();

        return redirect()->back()->with('message', 'The information has been updated successfully!');
    }
}



