@extends('header')

@section('content')

        <a href="/home">Home</a>->
        <a href='/pharmacie'>pharmacie</a>
    <h2>Modifier le produit : </h2>
    @if(isset($status))
                       
    <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{$status}}</strong> 
          </div>
        
    @endif
    <form method='post'  enctype="multipart/form-data" >
        <div class="col-sm-6">
                {{ csrf_field() }}

        <input class="form-control" type="text" name="titre" value={{$product->Titre}} />
            {!!$errors->first('titre',"<small class='help-block'>:message</small>")  !!}
            <input class="form-control" type="text" name="prix" value={{$product->prix}} />
            {!!$errors->first('prix',"<small class='help-block'>:message</small>")  !!}
            
            <input type="radio" name="type" value="pharmacie" @if($product->type=='pharmacie') checked @endif /><span>Pharmacie </span><span> </span>
            <div class="radio">
                <label><input type="radio" value ='Parapharmacie'name="type"  @if($product->type=='Parapharmacie') checked @endif /> ParaPharmacie</label>
            </div>
            {!!$errors->first('type',"<small class='help-block'>:message</small>")  !!}
            <div>
                <img src="{{asset($product->photoURI)}}"  class='productImgAlone'>
             </div>
            <label for="fileupload" class="custom_file_upload"><i class="fa fa-file-image-o"></i> Choisir une Autre image de produit</label>
            <input type="file" accept="image/*" name="imageProduit" id="fileupload" />
            {!!$errors->first('imageProduit',"<small class=' has-error help-block'>:message</small>")  !!}
        </div>
        <div class="col-sm-6">
        <textarea  name ='description'class="form-control input-lg" rows="7" >{{$product->description }}</textarea>
            {!!$errors->first('description',"<small class='help-block'>:message</small>")  !!}
            <button class="btn btn-success btn-block" type="submit"><i class="fa fa-plus"></i> Mettre a jour</button>
        </div>
    </form>


@endsection