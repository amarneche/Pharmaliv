@extends('header')

@section('content')

    <a href="/home">Home</a> -><a href='/pharmacie/produit/create'>pharmacie</a>
    <h2>Ajouter un produit a vendre : </h2>

    <form method='post'  enctype="multipart/form-data" >
        <div class="col-sm-6">
            
                {{ csrf_field() }}
                @if(isset($success))
                       
                <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{$success}}</strong> 
                </div>
                    
                @endif

            <input class="form-control" type="text" name="titre" placeholder="Titre de produit" />
            {!!$errors->first('titre',"<small class='help-block'>:message</small>")  !!}
            <input class="form-control" type="text" name="prix" placeholder="prix de produit" />
            {!!$errors->first('prix',"<small class='help-block'>:message</small>")  !!}
            <input type="radio" name="type" value="pharmacie" /><span>Pharmacie </span><span> </span>
            <div class="radio">
                <label>
                    <input type="radio" name="type" /> ParaPharmacie</label>
            </div>
            {!!$errors->first('type',"<small class='help-block'>:message</small>")  !!}
            <label for="fileupload" class="custom_file_upload"><i class="fa fa-file-image-o"></i> Choisir une image de produit</label>
            <input type="file" accept="image/*" name="imageProduit" id="fileupload" />
            {!!$errors->first('imageProduit',"<small class=' has-error help-block'>:message</small>")  !!}
        </div>
        <div class="col-sm-6">
            <textarea  name ='description'class="form-control input-lg" rows="7" placeholder="Description du produit "></textarea>
            {!!$errors->first('description',"<small class='help-block'>:message</small>")  !!}
            <button class="btn btn-success btn-block" type="submit"><i class="fa fa-plus"></i> Ajouter le produit</button>
        </div>
    </form>


@endsection