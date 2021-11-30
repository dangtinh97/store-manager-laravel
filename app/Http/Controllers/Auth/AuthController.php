<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return view('auth.login');
    }

    public function attempt(Request $request)
    {

    }
}
