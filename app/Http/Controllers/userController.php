<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


  


}