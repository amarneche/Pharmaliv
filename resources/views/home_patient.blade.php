@extends('header')

@section('content')
<div  id="buttons">
        <h1>Bienvenue Mr {{Auth::user()->nom ." ". Auth::user()->prenom}} </h1>
    <div class="row">
        <a href='/commande'> 
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-cart-plus icon"></i></p>
                    <hr>
                    <h4 class="text-uppercase text-center">Faire une commande</h4></div>
            </div>
        </div>
        </a>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-heart icon"></i></p>
                    <hr>
                    <h4 class="text-uppercase text-center">Parcourir les medicaments</h4></div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-th-list icon"></i></p>
                    <hr>
                    <h4 class="text-uppercase text-center">Mes Ordonnances</h4></div>
            </div>
        </div>
       
  
        
        <div class="col-md-4 col-sm-4 col-xs-6">
            <a href='/pharmacies'>
            <div class="thumbnail">
                <div class="caption">
                    <p class="text-uppercase text-center icon"><i class="fa fa-home icon"></i></p>
                    <hr>
                    <h4 class="text-uppercase text-center">Pharmacies </h4></div>
            </div>
            </a>
        </div>
        
    </div>
</div>


@endsection
