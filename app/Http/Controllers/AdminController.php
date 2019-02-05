<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\signUpRequest;
use Illuminate\Support\Facades\Hash;
use \Auth;
use Illuminate\Support\Facades\DB;
use App\User as User ;
use App\Pharmacie as Pharmacie;
use App\Medcin as Medcin;
use App\Livreur;

class AdminController extends Controller
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
    // return la route /admin
    public function index()
    
    {
        if(Auth::user()->typeDeCompte="admin"){
            return view('home_admin');
        }   

       
    }

    public function showPharmacies(){
        if (Auth::user()->typeDeCompte="admin"){
            return view ('admin_Pharmacie');
        }
    }
    public function getCreatePharmacie(){
        if (Auth::user()->typeDeCompte=="admin"){
            return view ('admin_createPharmacie');
        }
    }
    public function postPharmacie(signUpRequest $request){
        // create a new pharmacie : 

        $validate= $request->validate([
            'sexe'=>'required',
            'age'=>'required|number'
        ]);
        $user= User::create([
            
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom'=> $request->prenom,
            'sexe'=>$request->sexe,
            'age'=>$request->age,
            'password' => Hash::make($request->password),
            'adresse' =>$request->adresse,
            'mobile' =>$request->mobile,
            'typeDeCompte'=>'pharmacie'
        ]);
        $pharmacie =new Pharmacie();
        $pharmacie->id=$user->id;
        $pharmacie->ouvreA=$request->ouvreA;
        $pharmacie->fermeA=$request->fermeA;
        $pharmacie->positionGPS=$request->position;
        $pharmacie->adresse='';
        $pharmacie->journeeLibre=$request->journeeLibre;

        $pharmacie->save();
        return view('admin_createPharmacie');


    }

    public function getCreateMedcin(){

        return view('admin_createMedcin');
    }

    public function postMedcin(signUpRequest $request){
        $validate= $request->validate([
            'sexe'=>'required',
            'age'=>'required|number'
        ]);

        $user= User::create([
            
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom'=> $request->prenom,
            'sexe'=>$request->sexe,
            'age'=>$request->age,
            'password' => Hash::make($request->password),
            'adresse' =>$request->adresse,
            'mobile' =>$request->mobile,
            'typeDeCompte'=>'medcin'
        ]);

        $medcin = new  Medcin();
        $medcin->id=$user->id;
        $medcin->ouvreA=$request->ouvreA;
        $medcin->fermeA=$request->fermeA;
        $medcin->journeeLibre=$request->journeeLibre;
        $medcin->save();

        return view('admin_createMedcin',['status'=>'Pharmacie a ete bien ajouté']);
    }
    public function getCreateLivreur(){
        return view('admin_createLivreur');
    
    }
    public function postLivreur(signUpRequest $request){
        $validate= $request->validate([
            'sexe'=>'required',
            'age'=>'required|number'
        ]);
        $user= User::create([
            
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom'=> $request->prenom,
            'sexe'=>$request->sexe,
            'age'=>$request->age,
            'password' => Hash::make($request->password),
            'adresse' =>$request->adresse,
            'mobile' =>$request->mobile,
            'typeDeCompte'=>'livreur'
        ]);
        $livreur = new Livreur();
        $livreur->id=$user->id;
        $livreur->disponible=true;

        $livreur->save();
    }

    public function showCommandes(){
        $commandes = DB::table('commandes')                    
                    ->get();
        
        foreach($commandes as $commande){
            $commande->patient=DB::table('users')
                                ->where('id',$commande->patient)
                                ->first();
            $commande->pharmacie=DB::table('users')
                                ->where('id',$commande->pharmacie)
                                ->first();
            $commande->livreur=DB::table('users')
                                ->where('id',$commande->livreur)
                                ->first();
            $commande->ordonnance=DB::table('ordonnances')
                                ->where('id',$commande->ordonnance)
                                ->first();
        }
        return view ('admin_showCommandes',[
            'commandes'=>$commandes
        ]);


    }
    public function showCommande($id){

        $commande=Db::table('commandes')
                ->where('id',$id)
                ->first();
        
            //fetch  infos about commandes
            $commande->patient=DB::table('users')
                                ->where('id',$commande->patient)
                                ->first();
            $commande->pharmacie=DB::table('users')
                                ->where('id',$commande->pharmacie)
                                ->first();
            $commande->livreur=DB::table('users')
                                ->where('id',$commande->livreur)
                                ->first();
            $commande->ordonnance=DB::table('ordonnances')
                                ->where('id',$commande->ordonnance)
                                ->first();
            
            $livreurs=DB::table('livreurs')
                        ->join('users','livreurs.id','=','users.id')
                        ->where('disponible','=',true)
                        ->get();
            return view('admin_showCommande',[
                'commande'=>$commande,
                'livreurs'=>$livreurs
            ]);      


    }
    public function affecterCommande($idc,$idl){
        $commaned=DB::table('commandes')
                ->where('id',$idc)
                ->update([
                    'statusDeCommande'=>'running',
                    'livreur'=>$idl]);
        return redirect('/admin/commande/'.$idc);
    }
}
