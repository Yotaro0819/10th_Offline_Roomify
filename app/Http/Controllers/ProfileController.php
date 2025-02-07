<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id){

        $user = User::findOrFail($id);

        $reviews = $user->reviews()->latest()->get();

        return view('profile.guest_profile', compact('user', 'reviews'));
    }  
}
