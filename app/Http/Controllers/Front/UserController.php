<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //This Method will Call the welcome page then will be called from web.php Routes
    public function getIndex(){
        $data = [];
        $data['name'] = 'Shari';
        $data['id'] = 5005;

            $laptops = ['toshiba','hp','Dell'];
        $obj = new \stdClass();
        $obj -> name = 'Shari';
        $obj -> gender = 'Male';
        return view('welcome', compact('laptops'));
        //return view('welcome');
    }
}
