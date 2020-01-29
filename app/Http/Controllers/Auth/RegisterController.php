<?php

namespace App\Http\Controllers\Auth;

use App\Agent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/user/your-experience';
    protected $redirectTo = '/user/work-preference';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_status' => $data['user_status'],
            'visa_type' => $data['visa_type'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'education_background' => $data['education_background'],
            'language_level' => $data['language_level'],
            'phone' => $data['phone'],
            'date_of_birth' => $data['date_of_birth'],
            'facebook' => $data['facebook'],
            'skype' => $data['skype'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nationality_id' => $data['nationality_id'],
            'country_id' => $data['country_id'],
            'city' => $data['city'],


        ]);

        return Agent::create([
            'name' => $data['agent_name'],
        ]);
    }
}
