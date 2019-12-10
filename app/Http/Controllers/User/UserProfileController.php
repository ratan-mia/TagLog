<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function showProfile(){
        $user_id = Auth::id();
        $user    = User::find($user_id);

        return view('frontend.user.profile',compact('user'));
}
}
