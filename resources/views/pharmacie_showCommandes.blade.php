@extends('header')

@section("content")


<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Patient </th>
                <th>Date </th>
                <th>Commande </th>
            </tr>
        </thead>
        <tbody>
            @if($commandes)
                @foreach($commandes as $commande)
            <tr>
            <td><a href='/patient/{{$commande->patient}}'>{{$commande->nom .' '.$commande->prenom}}</a></td>
                <td>{{$commande->created_at}} </td>
                <td>
                    <div role="group " class="btn-group">
                    <button class="btn btn-link pull-right" type="link"> <a href ='/commandes/{{$commande->id}}'>Ouvrir</a> </button>
                       
                    @if($commande->statusDeCommande=='created')                  
                        
                        <button onclick="location.href='/commande/valider/{{$commande->id}}'" class="btn btn-success">Valider</button>
                        <button onclick="location.href='/commande/ignorer/{{$commande->id}}'" class="btn btn-danger">Annuler La commande</button>
                        {{csrf_field()}}                    
                    
                    @endif
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection