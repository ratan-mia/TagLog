<?php

namespace App\Http\Controllers\User;

use App\Agent;
use App\Country;
use App\Employer;
use App\Experience;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\StoreUserRequest;
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
        $experience = Experience::where('user_id', $user_id)->first() ? Experience::where('user_id', $user_id)->first() : '';
        $visas = Visa::all()->pluck('name', 'id');
        $profile_picture = $user->getMedia('profile_picture')->first() ? $user->getMedia('profile_picture')->first()->getUrl() : '';
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $nationalities = Nationality::all()->pluck('country_enNationality', 'id')->prepend(trans('global.pleaseSelect'), '');
        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expected_industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        if ($experience != null) {

            $experience->load('user', 'agent', 'destination', 'employer', 'industry');

        } else {

            $$experience ='Check';
        }


        return view('frontend.user.profile', compact('user', 'agents', 'experience', 'countries', 'destinations', 'expected_industries', 'employers', 'visas', 'nationalities', 'profile_picture'));
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

    public function updateWorkPreference(Request $request)
    {

        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->destination_area = $request->destination_area;
        $user->industries()->sync($request->input('expected_industries', []));
        $user->expected_salary = $request->expected_salary;
        $user->date_of_leaving = $request->date_of_leaving;
        $user->save();

        return redirect()->back()->with('message', 'The information has been updated successfully!');
    }

    public function workPreferenceForm()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $expected_industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.user.work-preference', compact('user', 'destinations', 'expected_industries'));

    }


    public function workPreference(Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->destination_area = $request->destination_area;
        $user->industries()->sync($request->input('expected_industries', []));
        $user->expected_salary = $request->expected_salary;
        $user->date_of_leaving = $request->date_of_leaving;
        $user->save();

        return redirect()->route('user.experience-form')->with('message', 'The information has been updated successfully!');
    }

    public function userExperienceForm()
    {
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.user.share-experience', compact('users', 'agents', 'destinations', 'employers', 'industries'));
    }

    public function shareExperience(Request $request)
    {

//        $user = User::create(['name' => 'John']);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $experience = Experience::create([
            'user_id' => $user_id,
            'visa_type' => $user->visa_type,
            'agent_id' => $request->agent_id,
            'expenses_paid' => $request->expenses_paid,
            'visa_application_rating' => $request->visa_application_rating,
            'language_training_rating' => $request->language_training_rating,
            'agent_rating' => $request->agent_rating,
            'employer_id' => $request->employer,
            'employer_location' => $request->employer_location,
            'industry_id' => $request->industry_id,
            'employment_date' => $request->employment_date,
            'employment_period' => $request->employment_period,
            'monthly_salary' => $request->monthly_salary,
            'monthly_living_expenses' => $request->monthly_living_expenses,
            'weekly_working_hours' => $request->weekly_working_hours,
            'monthly_days_off' => $request->monthly_days_off,
            'employer_rating' => $request->employer_rating,
            'employer_feedback' => $request->employer_feedback,

        ]);

        return redirect()->route('user.my-profile')->with('message', 'Thanks for sharing your experience!');
    }

    public function updateProfilePicture(Request $request, User $user){
//        $user->update($request->all());
//        if ($request->input('profile_picture', false)) {
//            if (!$user->profile_picture || $request->input('profile_picture') !== $user->profile_picture->file_name) {
//                $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_picture')))->toMediaCollection('profile_picture');
//            }
//        } elseif ($user->profile_picture) {
//            $user->profile_picture->delete();
//        }

//        if ($request->input('profile_picture')) {
//            $user->addMedia($request->file('profile_picture'))->toMediaCollection('profile_picture');
//
//
//        }

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()){
            $user->addMediaFromRequest('profile_picture')->toMediaCollection('profile_picture');
        }
        return redirect()->route('user.my-profile');
    }
}



