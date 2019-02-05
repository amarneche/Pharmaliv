@extends('header')

@section('content')

<h1>Bienvenue Mr  {{Auth::user()->nom ." ". Auth::user()->prenom }}</h1>

    <div class="row">
        
        <div class="col-md-4 col-sm-push-2 col-sm-4 col-xs-6">
            <a href="/commandes">
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-cart-plus icon"></i></p>
                    <hr />
                    <h4 class="text-uppercase text-center">Commandes </h4></div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-push-2 col-sm-4 col-xs-6">
            <a href='pharmacie/produit/create'>
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-plus-square icon"></i></p>
                    <hr />
                    <h4 class="text-uppercase text-center">Ajouter un produit</h4></div>
            </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-push-2 col-sm-4 col-xs-6">
                <a href='/pharmacie'>
                <div class="thumbnail">
                    <div class="caption">
                        <p class="text-uppercase text-center icon"><i class="fa fa-home icon"></i></p>
                        <hr />
                        <h4 class="text-uppercase text-center">Ma Pharmacie</h4></div>
                </div>
                </a>
            </div>
        
            <div class="col-md-4 col-sm-push-2 col-sm-4 col-xs-6">
            <a href='/pharmacie/edit'>
                <div class="thumbnail">
                    <div class="caption">
                        <p class="text-uppercase text-center icon"><i class="fa fa-user icon"></i></p>
                        <hr />
                        <h4 class="text-uppercase text-center">Mon Profil</h4></div>
                </div>
            </a>
            </div>
    </div>
       
    
@endsection