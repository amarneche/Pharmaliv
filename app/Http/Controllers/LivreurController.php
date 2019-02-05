<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;

class LivreurController extends Controller
{
    //

    
        public function showCommandes(){
            $commandes = DB::table('commandes') 
                        ->where('livreur',Auth::user()->id)                   
                        ->get();
            
            foreach($commandes as $commande){
                $commande->patient=DB::table('users')
                                    ->where('id',$commande->patient)
                                    ->first();
                $commande->pharmacie=DB::table('users')
                                    ->where('id',$commande->pharmacie)
                                    ->first();           
                $commande->ordonnance=DB::table('ordonnances')
                                    ->where('id',$commande->ordonnance)
                                    ->first();
            }
            return view ('livreur_showCommandes',[
                'commandes'=>$commandes
            ]);
    }

    public function showCommande($id){

                   $commande = DB::table('commandes') 
                        ->where('id',$id)                   
                        ->first();
            
            
                $commande->patient=DB::table('users')
                                    ->where('id',$commande->patient)
                                    ->first();
                $commande->pharmacie=DB::table('users')
                                    ->where('id',$commande->pharmacie)
                                    ->first();           
                $commande->ordonnance=DB::table('ordonnances')
                                    ->where('id',$commande->ordonnance)
                                    ->first();
            
            return view ('livreur_showCommande',[
                'commande'=>$commande
            ]);
    }
    public function validerCommande($id){
        $commande=DB::table('commandes')
                ->where('id',$id)
                ->update([
                    'statusDeCommande'=>'finnished'
                ]);
        return redirect('/livreur/commandes/'.$id);
    }
}
