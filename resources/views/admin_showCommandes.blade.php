@extends('header')

@section("content")


<div class="col-sm-12">
        <a href="/home" class="href">Home</a>
       
</div>
<div class="col-sm-12">
<div class="table-responsive">
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>Patient </th>
                <th> Pharmacie </th>
                <th> Livreur </th>
                <th>Date </th>
                <th>Etat de Commande </th>
                
            </tr>
        </thead>
        <tbody>
            @if($commandes)
                @foreach($commandes as $commande)
            <tr
             @switch($commande->statusDeCommande)
                @case('created')
                    class='table-success'
                    @break
                @case('prepared')
                    class="bg-info"                    
                    @break       
                @case('canceled')
                 class='bg-danger'
                    @break
                @case('finnished')
                class="bg-success"
                    @break
             @endswitch
            >
            <td><a href='/patient/{{$commande->patient->id}}'>{{$commande->patient->nom .' '.$commande->patient->prenom}}</a></td>
            <td> <a href='/pharmacie/{{$commande->pharmacie->id}}'>{{$commande->pharmacie->nom .' '.$commande->pharmacie->prenom }} </a></td>
            <td> @if($commande->livreur)
                 <a href="/livreur/{{$commande->livreur->id}}"> {{$commande->livreur->nom .' '.$commande->livreur->prenom}}</a> 
                @else Non Affecté
                 @endif
            </td>
                 <td>{{$commande->created_at}} </td>
                
                <td>
                    <div role="group " class="btn-group">
                    <button class="btn btn-link pull-right" type="link"> <a href ='/admin/commande/{{$commande->id}}'>Ouvrir</a> </button>
                       
            @switch($commande->statusDeCommande)
                @case('created')
                    En cours D'evaluation par la pharmcie
                    @break
                @case('prepared')
                     <button class='btn btn-success btn-sm pull-right' onclick="window.location.href='/admin/commande/{{$commande->id}}' " >Preparée !!Affecter a un Livreur    </button>            
                    @break       
                @case('running')
                    en cours de livraison 
                    @break
                @case('canceled')
                    Annulée par le pharmacien
                    @break
                @case('finnished')
                    Livrée avec success en {{$commande->updated_at}}
                    @break
             @endswitch
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>

@endsection