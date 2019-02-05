<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->typeDeCompte=="patient"){
            return view('home_patient');
        }
        else if(Auth::user()->typeDeCompte=="medcin"){
            return view('home_medcin');
        }
        else if (Auth::user()->typeDeCompte=="pharmacie"){
            return view('home_pharmacie');
        }
        else if (Auth::user()->typeDeCompte=="livreur"){
            return view('home_livreur');
        }
        else if (Auth::user()->typeDeCompte=="admin"){
            return view('home_admin');
        }

       
    }
}
