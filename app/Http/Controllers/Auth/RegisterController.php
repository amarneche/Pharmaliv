<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Patients;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $patient;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mobile'=>'required',
            'assurance'=>'required|image|mimes:jpeg,png,jpg',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $user= User::create([
            
            'email' => $data['email'],
            'nom' => $data['nom'],
            'prenom'=> $data['prenom'],
            'password' => Hash::make($data['password']),
            'sexe'=> $data['sexe'],
            'age'=>$data['age'],
            'adresse' =>$data['adresse'],
            'mobile' =>$data ['mobile'],
            'typeDeCompte'=>'patient'
        ]);

        if($user){
            //Transfere de l'image d'assurance :
                $img=$data["assurance"];
                $fileName=$user->id.$data['nom'].'_'.$data['prenom'].'_Assurance.'.$img->getClientOriginalExtension();
                $img->move(public_path('images_Assurance'),$fileName);


            $patient=new Patients();
            $patient->idpatient=$user->id;
            $patient->assuranceURI='images_Assurance/'.$fileName;
            $patient->alergie=$data['alergie'];
            $patient->traitement=$data['traitement'];
            if($data['sexe']=='femme'){
                if ($data['enceinte']=='oui') $patient->enceinte=true;
                else $patient->enceinte=false;
            }
            $patient->paymentParDefault	="Main a Main";
            $patient->save();
          
        }
        return $user;
       
    }
}
