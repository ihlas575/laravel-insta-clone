<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        return view('profile', compact('user'));
    }

    public function feed()
    {
        return view('feed');
    }
}
