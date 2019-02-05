<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth as Auth    ;
use \App\Ordonnance;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\signUpRequest;
use \App\Produit as Produit;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProductRequest as ProductRequest;

class PharmacieController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function getCreateProduit(){

        if(Auth::user()->typeDeCompte=='pharmacie'){
            //
            return view('pharmacie_createProduit');
        }
    }

    public function postCreateProduit(ProductRequest $request){
       if (Auth::user()->typeDeCompte=="pharmacie"){
            // Le transfert de l'image du produit 
            $img=$request->imageProduit;
            $fileName=rand(1000,99999).$request->titre.'_produit.'.$img->getClientOriginalExtension();
            $img->move(public_path('images_produit'),$fileName);
            //creation d'un nouveau produit

            $produit = new Produit();
            $produit->titre =$request->titre;
            $produit->pharmacie= Auth::user()->id;
            $produit->description=$request->input('description');
            $produit->photoURI='images_produit/'.$fileName;


            $produit->notice="";
            $produit->type=$request->type;
            $produit->prix=$request->prix;

            $produit->save();

            return view('pharmacie_createProduit',['success'=>'Le produit a ete bien ajouté a votre store']);


        }


    }
    

    public  function getEditProfile(){
        $user = DB::table('pharmacies')->where('id', Auth::user()->id)->first();

        return view('pharmacie_Edit',['user'=>$user]);
    }
    public function postEditProfile(signUpRequest $request){

    }

    public function showProducts(){
        $products = DB::table('produits')->where('pharmacie',Auth::user()->id)->get();
        return view ('pharmacie_showProducts',['products'=>$products]);
    }
    public function getEditProduit($id){
        $product= DB::table('produits')->where('id',$id)->first();

        return view ('pharmacie_EditProduit',['product'=>$product]);

    }
    public function postEditProduit($id){
        //update the product details !

    }
    //affiche la liste des commandes 
    public function showCommandes(){
        if(Auth::user()->typeDeCompte=='pharmacie'){ 
        $commandes=Db::table('commandes')
                    ->join('users','commandes.patient','=','users.id')
                    ->select('commandes.id','commandes.statusDeCommande','commandes.created_at','commandes.patient','users.nom','users.prenom')
                    ->where('commandes.pharmacie','=',Auth::user()->id)
                    ->latest()
                    ->get();
       
        return view('pharmacie_showCommandes',['commandes'=>$commandes]);
    }
    }

      //affiche une commande particulier
    public function showCommande($id){
        $products=DB::table('achats')
                    ->join('produits','achats.produit','=','produits.id')
                    ->select('produits.titre','produits.prix','achats.qte')
                    ->where('achats.commande','=',$id)
                    ->get();
        $ord=DB::table('commandes')
                    ->join('ordonnances','commandes.ordonnance','=','ordonnances.id')
                    ->select('ordonnances.id','commandes.statusDeCommande','ordonnances.photoURI')
                    ->where('commandes.id','=',$id)
                    ->first();
                    
        $status=DB::table('commandes')
                    ->where('id',$id)
                    ->first();
        if($status)
        
        $status= $status->statusDeCommande;
        return view('pharmacie_showCommande',[
                'products'=>$products,
                'ordonnance'=>$ord ,
                'id'=>$id     ,
                'status'=>$status
        ]);
        
    }

    public function validerCommande($id){
        $cmd=DB::table('commandes')
                ->where('id','=',$id,'and','statusDeCommande','=','created')
                ->update(['statusDeCommande'=>'prepared']);
        return back();
    }
    public function rejeterCommande($id){
        $cmd=DB::table('commandes')
        ->where('id','=',$id,'and','statusDeCommande','=','created')
        ->update(['statusDeCommande'=>'canceled']);

        return back();
    }

}
