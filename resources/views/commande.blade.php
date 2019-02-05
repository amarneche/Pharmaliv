@extends('header')
@section('content')

<div class="col-md-6 col-sm-6">
        @if(session('success'))                       
        <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('success')}}</strong> 
        </div>            
        @endif
        @if(session('failure'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!!session('failure')!!}</strong> 
        </div>  
        @endif
        <h1>Vous commandez</h1>
        {{Form::open(['url'=>'commande','files'=>true])}}
        <span>Charger une photo : </span>
        <label for="fileupload" class="custom_file_upload">
                
                 <i class="fa fa-file-image-o"></i> Choisir une photo
        </label>
        
        <input type="file" required name='ordonnance' id="fileupload" accept=".jpeg,.jpg,.png"/>
        {!!$errors->first('ordonnance',"<small class='help-block'>:message</small>")  !!}
        
        <button class='btn  inline-block btn-success'>Charger</button>
        
        {{Form::close()}}

        <span>ou choisir parmi les dernierre ordonnances recu : </span>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Dernieres ordonnances</h3></div>
            <div class="panel-body">
                <div class="listOrdonnance">
                   
                        <form   method="POST">
                            
                            {{csrf_field()}}
                    @foreach ( $ords as $ord)
                    
                    <a href="/patient/setordonnance/{{$ord->id}}">
                        <img class='productImgAlone' src="{{asset($ord->photoURI)}}" />
                    </a>
                   
                    @endforeach 
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
            <div class="panel panel-default" id="commande">
                <div class="panel-heading">
                    <h3 class="panel-title">Votre commande contient </h3></div>

                <div class="panel-body">
                    @if($cart)
                        @if($cart->produits)
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
                            @foreach($cart->produits as $id=>$produit)
                        <tr>
                            <form  method='post' action='/commande/delete/{{$id}}'>
                                {{csrf_field()}}
                            <td> <strong> {{$produit[0]->Titre}}</strong> </td>
                            <td> <strong>{{$produit[1]}}</strong></td>
                            <td> <strong>{{$produit[0]->prix}}</strong></td>
                            <td><button class='btn btn-danger'><i class='fa fa-trash'></i> </button>
                            </form>


                        </tr>
                            @endforeach
                                </tbody>
                        </table>
                        @endif
                        
                        @if($cart->photo)                            
                            <img  class='ordonnance'src={{asset($cart->photo)}}>                       
                        @endif
                        <form action='/commande/valider' method="POST">
                            
                            
                            {{csrf_field()}}
                            <button class="btn btn-block btn-success">Valider</button>
                        </form>

                    @endif

            </div>
        </div>

    @endsection