<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $user;
    
    public function index(){

        $messages = [];
        return view('messages.index', compact('messages'));
    }
}
