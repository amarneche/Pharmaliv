@extends('header')

@section('content')
        <a href='/home'>Home </a>
        -> <a href='/pharmacies' class='active'>{{$results->nom}}</a> 
        </br>   
        <div class="col-md-3 col-sm-3">
       
            <div class="thumbnail">
            <a href='/pharmacie/{{$results->id}}'>
                <div class="caption">
                    <h4 class="text-center">{{$results->nom}} Bensahli</h4>
                    <hr>
                    
                    <p><strong>Tel</strong> : 0{{$results->mobile}} </p>
                    <p><strong>Adresse : {{$results->adresse}}</p>
                    <p> <strong>Ouvre a : {{$results->ouvreA }} h </p>   
                    <p> <strong>Ferme a : {{$results->fermeA}} h </p>
                    <p> <strong>Journee Libre : {{$results->journeeLibre}} </p>
                    <p> <strong>Postition GPS :</strong><a href='' >{{$results->positionGPS}}</a></p>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail"><img src={{asset($product->photoURI)}} class="productImg" />
                                    <div class="caption">
                                        <h4 class="text-center">{{$product->Titre}} </h4>
                                        <form method='post' action='/patient/ajouterproduit/{{$product->id}}'>
                                        <div class="input-group input-group-sm">
                                            
                                            <input class="form-control" name ="qte" type="text" placeholder="Qte" inputmode="numeric" />
                                            <div class="input-group-btn">
                                                    {{ csrf_field() }}
                                                <button onclick="e.preventDefault()" class="btn btn-success"><span><i class="fa fa-shopping-cart"></i> Ajouter</span></button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    </div>
                                </div>
                        </div> 
                        @endforeach           
                </div>
        </div>
      
   
    
   



@endsection