@extends('header')

@section('content')

<h1>Bienvenue Dr {{Auth::user()->nom ." ". Auth::user()->prenom }}</h1>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="thumbnail">
            <div class="caption">
                <p class="text-uppercase text-center icon"><i class="fa fa-user icon"></i></p>
                <hr />
                <h4 class="text-uppercase text-center">Mon Profil</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="thumbnail">
            <div class="caption">
                <p class="text-uppercase text-center icon"><i class="fa fa-users icon"></i></p>
                <hr />
                <h4 class="text-uppercase text-center">Mes Patients</h4></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <a href="/medcin/envoyer">
        <div class="thumbnail">
            <div class="caption">
                <p class="text-uppercase text-center icon"><i class="fa fa-list-alt icon"></i></p>
                <hr />
                <h4 class="text-uppercase text-center">Envoyer une ordonnance</h4></div>
        </div>
        </a>
    </div>
</div>
@endsection