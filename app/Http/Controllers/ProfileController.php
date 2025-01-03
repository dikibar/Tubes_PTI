<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function userProfile(){
        $user = User::with('profile')->first();
        return view('profile',['user' => $user]);
    }
}
