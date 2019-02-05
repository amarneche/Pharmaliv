@extends('header')

@section('content')

<div class="row">
    <div class="col-sm-12">
    <a href="/home">Home</a>->
    <a href='/pharmacie'>pharmacie</a>
    </div>
    @foreach($products as $product)
        <div class="col-sm-3 col-xs-6">
            <div class="thumbnail"><img src={{asset($product->photoURI)}} class="productImg" />
                <div class="caption">
                    <h4 class="text-center">{{$product->Titre}} </h4>
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="text" value="{{$product->prix}} DA"  disabled inputmode="numeric" />
                        <div class="input-group-btn">
                            <button onclick="window.location.href='/pharmacie/produit/{{$product->id}}/edit'" class="btn btn-success" type="link" href='/home'>
                                <span><i class="fa fa-shopping-cart"></i> Modifier</span>
                            </button>
                            <button onclick="window.location.href='/pharmacie/produit/{{$product->id}}/delete'" class="btn btn-warning" type="submit">
                                    <span><i class="fa fa-shopping-cart"></i> supprimer</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
    @endforeach
</div>


@endsection