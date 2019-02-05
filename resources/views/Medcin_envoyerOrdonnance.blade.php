@extends('header')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-push-3">
                {{Form::open(['url'=>'/medcin/envoyer','files'=>true])}}
            
                <div class="col-sm-8 {!!$errors->has('email') ?'has-error':''!!}">
                        <input name='email' class="form-control" type="text" placeholder="Adresse Email" />
                        {!!$errors->first('email','<small class="help-block">:message</small>') !!}
                </div>
                <div class="col-sm-12">

                <span>Charger une photo : </span>
                <label for="fileupload" class="custom_file_upload">
                        
                         <i class="fa fa-file-image-o"></i> Choisir une photo
                </label>
                
                <input type="file" required name='ordonnance' id="fileupload" accept=".jpeg,.jpg,.png"/>
                {!!$errors->first('ordonnance',"<small class='help-block'>:message</small>")  !!}

                <button class='btn  inline-block btn-success'>Charger</button>
                
                {{Form::close()}}
            </div>

        </div>
    </div>

@endsection