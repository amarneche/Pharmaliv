<?php

namespace App\Http\Controllers;
use Auth;
use App\Cart;
use App\Produit;

use Session;
use App\Ordonnance;
use App\Commande;
use App\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //



    public function getShowPharmacies(){
        $results =DB::table('users')
                    ->join('pharmacies','users.id','=','pharmacies.id')
                    ->select('users.*','pharmacies.*')
                    ->get();
        $defaultPharmacie= DB::table('patients')
                            ->where('idpatient',Auth::user()->id)
                            ->first();
                            
         if($defaultPharmacie){ 
        $defaultPharmacie=$defaultPharmacie->pharmacie;}
            
        return view('patient_showPharmacies',
            ['results'=>$results  ,                          
             'defaultPharmacie'=>$defaultPharmacie
            ]
    );
}

    public function postDefaultPharmacie($id){
        $pharmacie=DB::table('pharmacies')
                    ->where('id',$id)
                    ->get();
        if($pharmacie) {
        $patient=DB::table('patients')
                        ->where('idpatient',Auth::user()->id)
                        ->update(['pharmacie'=>$id]);
       

        
        return redirect('/pharmacies'); } 

    }
    public function getShowPharmacie($id){

        $results =DB::table('users')
                    ->join('pharmacies','users.id','=','pharmacies.id')
                    ->select('users.*','pharmacies.*')
                    ->where('users.id','=',$id)
                    ->first();
        if($results!=null){ 
        $products = DB::table('produits')->where('pharmacie',$id)->get();
        return view('patient_showPharmacie',['results'=>$results,'products'=>$products]);
        }
        else return redirect('/home');

    }

    public function getMedcin(){
        return view('mesMedcin');
    }

    public function getCommande(){
        $ords = Ordonnance::where('patient',Auth::id())->take(10)->get();
        $cart = Session::has('cart')? Session::get('cart'):null;
       

       
        return view('commande',['ords'=>$ords,'cart'=>$cart]);
    }
    public function postCommande(Request $request){
        // Charger une ordonnance 
        $img=$request->ordonnance;
        $validator=$request->validate([
            'ordonnance'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        if($img){ 

        $fileName=rand(1000,99999).Auth::user()->nom.'_'.Auth::user()->prenom.'.'.$img->getClientOriginalExtension();
        $img->move(public_path('images_ordonnance'),$fileName);

        $ord=new Ordonnance();
        $ord->patient=Auth::user()->id;
        $ord->photoURI='images_ordonnance/'.$fileName;
        $ord->save();   
        $oldCart= Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->setOrdonnance($ord->id,$ord->photoURI);
        
        Session::put('cart',$cart);
       


        return redirect('/commande')->with('success',"ordonance chargé !");
        }

    }

    public function postAddproduct(Request $request,$produit){
        $oldCart= Session::has('cart')? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        
        $qte= $request->qte!=null ?$request->qte :1;
        
        $product=Produit::find($produit);
        if($product){ 
        $cart->add($product,$qte);
        

        Session::put('cart',$cart);
       
        }
        return back();
    }

     public function  postDeleteProduct ($id){
        $oldCart= Session::has('cart')? Session::get('cart') : null;
        $cart=new Cart($oldCart); 
        $cart->delete($id);       

        Session::put('cart',$cart);
        return back();
     }
    public function setOrdonnance($id){
        $oldCart= Session::has('cart')? Session::get('cart') : null;
        $cart=new Cart($oldCart);
       $ord= Ordonnance::find($id);
        if($ord){ 
        $cart->setOrdonnance($ord->id,$ord->photoURI);
            Session::put('cart',$cart);
    }
    return back();
    }
    // a post request 
    public function validerCommande(Request $request){
     
        $commande = new Commande();
        $commande->patient=Auth::user()->id;
        $commande->dateSouhaite=$request->dateSouhaite;
        $commande->creneauDe=$request->creneauDe;
        $commande->creneauA=$request->creneauA;
        $commande->statusDeCommande='created';


        $defaultPharmacie= DB::table('patients')
                            ->where('idpatient',Auth::user()->id)
                            ->first();
                            
         if($defaultPharmacie){ 
        $defaultPharmacie=$defaultPharmacie->pharmacie;}
        else $defaultPharmacie=null;
        
        $cart= Session::has('cart')? Session::get('cart') : null;
        if($cart){
            $ordonnance = $cart->ordonnanceID;
            if($ordonnance){
                $commande->ordonnance=$ordonnance;
                if($defaultPharmacie){

                    $commande->pharmacie=$defaultPharmacie;
                    $commande->save(); //creation de la commande 
                    //verifier si y'as d'autre produit 
                    if($cart->produits){
                        $pharmacies=array();
                        foreach($cart->produits as $id=>$produit){
                            $pharmacie=$produit[0]->pharmacie;
                            if(  $pharmacie==$defaultPharmacie){
                                // creer juste un achat 
                                $achat= new Achat();
                                $achat->produit=$id;
                                $achat->commande=$commande->id;
                                $achat->qte=$produit[1];
                                $achat->save();
                            } 
                            else{
                                if(array_key_exists($pharmacie,$pharmacies)){
                                $achat= new Achat();
                                $achat->produit=$id;
                                $achat->commande=$pharmacies[$pharmacie];
                                $achat->qte=$produit[1];
                                $achat->save();
                                }
                                else{
                                    $cmd= new Commande();
                                    $cmd->patient=Auth::user()->id;                                   
                                    $cmd->dateSouhaite=$request->dateSouhaite;
                                    $cmd->creneauDe=$request->creneauDe;
                                    $cmd->creneauA=$request->creneauA;
                                    $cmd->pharmacie=$pharmacie;
                                    $cmd->statusDeCommande='created';
                                    $cmd->save();
                                    $pharmacies[$pharmacie]=$cmd->id;

                                    $achat= new Achat();
                                    $achat->produit=$id;
                                    $achat->commande=$pharmacies[$pharmacie];
                                    $achat->qte=$produit[1];
                                    $achat->save();

                                }
                            }

                        }
                    }
                    $cart=null;
                    Session::put('cart',$cart);
                    return back()->with('success','Commande effectué !');
                }
                else {
                    return back()->with('failure','veuillez Allez au <a href="/pharmacies">pharmacies</a> et choisisez une pharmacie par default');
                }
            }
            else {
                return back()->with('failure','veuillez choisissez une ordonnance');
            }

        }     
       return back();

    }


}
