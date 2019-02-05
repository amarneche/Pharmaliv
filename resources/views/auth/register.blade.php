@extends('header')

@section('content')

<div class="col-md-8 col-md-push-2">
        <div class="jumbotron">
            <h2 class="text-center"><i class="fa fa-user-plus"></i> Creer un compte </h2>
            {{Form::open(['url'=>'register','files'=>true])}}
                <div class="form-group"></div>
                <div class="form-group row">
                    <div class=" col-md-6 {!!$errors->has('nom') ?'has-error':''!!}">
                        
                    {{Form::text('nom',null,['placeholder'=>'Votre nom','class'=>'form-control input'])}}
                    {!!$errors->first('nom','<small class="help-block" >:message </small>') !!}
                    </div>
                    <div class="col-md-6 {!!$errors->has('prenom') ?'has-error':''!!}">
                    {{Form::text('prenom',null,['placeholder'=>'Votre prenom','class'=>'form-control input'])}}
                    {!!$errors->first('prenom','<small class="help-block" >:message </small>') !!}
                    </div>   
                    <div class="col-md-4 {!!$errors->has('mobile') ?'has-error':''!!}">
                    {{Form::text('mobile',null,['placeholder'=>'Votre numero mobile','class'=>'form-control input'])}}
                    {!!$errors->first('mobile','<small class="help-block" >:message </small>') !!}
                    </div>  
                    <div class="col-md-8{!!$errors->has('email') ?'has-error':''!!}">
                     {{Form::text('email',null,['placeholder'=>'Votre Email','class'=>'form-control input'])}}
                     {!!$errors->first('email','<small class="help-block" >:message </small>') !!}
                            </div>               
                    <div class="col-md-12 {!!$errors->has('password') ?'has-error':''!!}">
                     {{Form::password('password',['placeholder'=>'********','class'=>'form-control input'])}}
                     {!!$errors->first('password','<small class="help-block" >:message </small>') !!}
                      </div>

                   
                      <div class="col-md-6 pull-left {!!$errors->has('sexe')?'has-error':''!!}"> 
                        <strong>Sexe  :</strong>
                        <input  type="radio" name="sexe" value="homme" ><strong >Homme </strong> 
                        <input type="radio" name="sexe" value="femme"><strong>Femme </strong>
                        {!!$errors->first("sexe","<small class='help-block' >:message </small>")!!}
                        <hr>                        
                    </div>
                    <div class='col-md-6 {!!$errors->has('age')?'has-error' :''!!}'>
                        <input class="form-control input" type='text' name='age' placeholder ='Age'>
                    </div>
                
                 <!--   <div class="col-md-6{!!$errors->has('wilaya') ?'has-error':''!!} form-group inline ">
                        <strong> votre wilaya de residence</strong>
                    <select class="form-control " name="wilaya" required="">
                        <optgroup label="Wilaya de residence">
                            <option value="9">Blida</option>
                            <option value="16">Alger</option>
                            <option value="31">Oran</option>
                            <option value="23">Annaba</option>
                        </optgroup>
                    </select>
                    {!!$errors->first('wilaya','<small class="help-block">:message </small>')!!}
                    </div>
                    <div class="col-md-6 {!!$errors->has('commune')?'has-error':''!!} form-group inline ">
                        <strong>Commune </strong>
                    <select class="form-control" name="commune" required="">
                        <optgroup label="Wilaya de residence">
                            <option value="9">Beni Mered</option>
                            <option value="16">Oulad Yaich</option>
                            <option value="31">Blida</option>
                            <option value="23">Annaba</option>
                        </optgroup>
                    </select>
                    {!!$errors->first('commune','<small class="help-block">:message</small>')!!}
                    </div> -->
                
                    
                   
                    
                    <div class=" col-md-12 {!!$errors->has('adresse')?'has-error' : ''!!}">
                        <strong>Votre adresse</strong> 
                        <input name='adresse' class="form-control " type="text" required="">
                        {!!$errors->first('adresse','<small class="help-block">:message</small>')!!}
                    </div>
                    <div class=" col-md-12 {!!$errors->has('assurance')!!}" >
                        <strong>Une photo de votre assurance</strong>
                        <input type="file" accept="image/*" name="assurance" required="">
                        {!!$errors->first('assurance','<small class="help-block">:message</small>')!!}
                        <hr>
                    </div>
                    <div class="col-md-12 ">
                        <strong> Avez vous des Traitment en cours </strong>
                        <input type='text' name='traitement' class='form-control input'>
                    </div> 
                    <div class='col-md-12'>
                        <strong>Avez vous des allergies eventuelles ?
                        <input type='text'  name='alergie'class='form-control input'>
                    </div>
                    <div class='col-md-12'>
                        <strong>* Pour les femmes  etes vous enceinte ou vous Allaitez ? </strong></br>
                        <input type='radio' name='enceinte'  value ='oui'> <strong>Oui </strong>
                        <input type='radio' name='enceinte' value='non'><strong> Non </strong>
                    </div>

                    
                    
                </div>
                <button class="btn btn-success btn-block" type="submit"><i class="fa fa-user-plus"></i> S'inscrire </button>
                <a class="btn btn-link btn-block" role="button" href="SignIn.html">Se Connecter</a>
                {{form::close()}}
            <hr>
        </div>
    </div>

@endsection