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
            <tr
                @switch($commande->statusDeCommande)
                    @case('running')
                        class='bg-primary'
                        @break
                    @case('finnished')
                        class='bg-success'
                        @break
                @endswitch
                ></tr>
            <td><a href='/patient/{{$commande->patient->id}}'>{{$commande->patient->nom .' '.$commande->patient->prenom}}</a></td>
                <td>{{$commande->created_at}} </td>
                <td>
                    <div role="group " class="btn-group">
                    <button class="btn btn-link pull-right" type="link"> <a href ='/livreur/commandes/{{$commande->id}}'>Ouvrir</a> </button>
                       
                    @if($commande->statusDeCommande=='running')                  
                        
                        <button onclick="location.href='/livreur/commande/valider/{{$commande->id}}'" class="btn btn-sm btn-success">Valider</button>
                        {{csrf_field()}}                    
                    @else 
                        Commande fini
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