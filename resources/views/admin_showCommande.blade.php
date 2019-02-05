@extends('header')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="/home" class="href">Home</a>->
            <a href="/admin/commandes" class="href">Commandes</a>
        </div>
        <div class="col-sm-6">
            <table class="table table-responsive">
                <thead>
                    <th>A propos la commande</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <strong>Patient</strong>  </td>
                        <td> <a href='/patient/{{$commande->patient->id}}'>{{$commande->patient->nom .' '.$commande->patient->prenom}}</a>
                    </tr>

                    <tr>
                        <td> <strong>Pharmacie</strong></td>
                        <td><a href="/pharmacie/{{$commande->pharmacie->id}}">{{$commande->pharmacie->nom .' '.$commande->pharmacie->prenom}}</a></td>
                    </tr>
                    <tr>
                        <td><strong>Adresse </strong></td>
                        <td>{{$commande->patient->adresse}}</td>
                    </tr>
                    <tr>
                        <td><strong>Date Souhaité </strong></td>
                        <td> {{$commande->dateSouhaite}}</td>

                    </tr>
                    <tr>
                        <td><strong>Crenau horraire</strong></td>
                    <td>{{$commande->creneauDe .' A '.$commande->creneauA}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-sm-6">
            
            <table class="table table-responsive">              
                
                @if($commande->statusDeCommande=='prepared')
                    <thead>
                            <th>Liste Des livreurs disponible</th>
                        </thead>    
                                   
                     @foreach($livreurs as $livreur)
                     <tbody> 
                    <tr>
                    <td><strong>{{$livreur->nom .' '.$livreur->prenom}}</strong></td>
                    <td>{{$livreur->positionGPS}}</td>
                    <td>{{csrf_field()}}
                       <button class="btn btn-sm btn-success" onclick="window.location.href='/admin/commandes/{{$commande->id}}/livreur/{{$livreur->id}}'">
                          Affecter la commande 
                        </button> 
                    </td>
                    </tr>
                    </tbody>
                     @endforeach
                @elseif($commande->statusDeCommande=='running')
                <th><div class="alert alert-warning"><strong>Cette commande est pris en charge par : {{$commande->livreur->nom .' '.$commande->livreur->prenom}}</strong></div></th>
                @elseif($commande->statusDeCommande=='canceled')
                <th><div class="alert alert-danger"> <strong>Cette Commande a été Annulé par La pharmacie de : {{$commande->pharmacie->nom.' '.$commande->pharmacie->prenom}}</strong></div></th>
                @elseif($commande->statusDeCommande=='finnished')
                <th> <div class="alert alert-success">
                    <strong>Cette Commande a été livrée avec succces </strong>
                </div>

                @endif                    
                
            </table>
            
        </div>

    </div>

@endsection