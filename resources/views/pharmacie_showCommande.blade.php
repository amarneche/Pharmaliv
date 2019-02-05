@extends('header')


@section('content')

    <div class="row">
        <div class="col-sm-8">
            @if(session('failure'))
            <div class="alert alert-danger">
                {{session('failure')}}
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if($status=='canceled')
                <div class="alert alert-danger">
                    Cette commande a été annulé par vous 
                </div>
            @endif

            @if($status=='prepared')
                <div class='alert alert-success'>
                    cette commande a été preparer un livreur sera notifié !
                </div>
            
            @endif

            @if($status=='completed')
                <div class='alert alert-success'>
                    cette commande a été livré avec success
                </div>
            @endif

        </div>
        <div class="col-sm-4">
            @if($status=='created')
            <button onclick="location.href='/commande/valider/{{$id}}'" class="btn btn-success">Valider</button>
            <button onclick="location.href='/commande/ignorer/{{$id}}'" class="btn btn-danger">Annuler La commande</button>
            {{csrf_field()}}  
            
            @endif
    </div>
    <div class="row">
        <div class="col-sm-6">
            @if($products)
            <table class='table table-hover'>
                    <thead>
                            <tr>
                                <th>Medicament </th>
                                <th>Quantite </th>
                                <th>Prix unitaire</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                @foreach($products as $product)
                        <tr>
                            <td>  {{$product->titre}} </td>
                            <td>   {{$product->qte}} </td>
                            <td>    {{$product->prix}}</td>
                        </tr>
                @endforeach
                    </tbody>
            </table>
            @endif

        </div>
        <div class="col-sm-6">
            @if($ordonnance)
        <img src={{asset($ordonnance->photoURI)}} alt="" class='ordonnance'>
            @endif
        </div>


    </div>

@endsection