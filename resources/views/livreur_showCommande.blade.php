@extends('header')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="/home" class="href">Home</a>->
            <a href="/livreur/commandes" class="href">Commandes</a>
        </div>
        <div class="col-sm-6">
            @if($commande->statusDeCommande=='finnished')
            <div class="alert alert-success">
                    cette Commande a ete livree avec succee
            </div>
            @endif
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
                            <td><strong>Adresse </strong></td>
                            <td>{{$commande->patient->adresse}}</td>
                    </tr>

                    <tr>
                        <td> <strong>Pharmacie</strong></td>
                        <td><a href="/pharmacie/{{$commande->pharmacie->id}}">{{$commande->pharmacie->nom .' '.$commande->pharmacie->prenom}}</a></td>
                    </tr>
                    <tr>
                        <td><strong>Adresse :</strong></td>
                        <td>
                            {{$commande->pharmacie->adresse}}
                        </td>
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
            @if($commande->statusDeCommande=='running')
            <div class="col-sm-12">
                    <button onclick="location.href='/livreur/commande/valider/{{$commande->id}}'" class="btn  btn-block btn-sm btn-success">Valider</button>
            </div>
            @endif

        </div>
        
    </div>

@endsection