<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Ordonnance;

use Illuminate\Http\Request;

class MedcinController extends Controller
{
    //
    public function getEnvoyer(){
        return view('Medcin_envoyerOrdonnance');
    }
    public function postEnvoyer(Request $request){
        $validate= $request->validate([
            'email'=>'required|email',
            'ordonnance'=>'required |image|mimes:jpg,jpeg,png'
        ]);

        $user=Db::table('users')
                ->where('email',$request->email)
                ->first();
        if($user){
            $img=$request->ordonnance;

            $fileName=rand(1000,99999).Auth::user()->nom.'_'.Auth::user()->prenom.'.'.$img->getClientOriginalExtension();
            $img->move(public_path('images_ordonnance'),$fileName);
    
            $ord=new Ordonnance();
            $ord->patient=$user->id;
            $ord->medcin=Auth::user()->id;
            $ord->photoURI='images_ordonnance/'.$fileName;
            $ord->save();
        }
        return redirect('/medcin/envoyer');
    }
    
}
