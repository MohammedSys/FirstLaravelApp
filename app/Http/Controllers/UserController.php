<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function store(request $request)
    {
        //echo "Welcome to the User Controller";
        //print_r($request->input());
        echo $name = $request ->input('name');
        echo "<br>";
        echo $email = $request ->input('email');
        echo "<br>";
        echo $password = $request ->input('password');
    }
}
