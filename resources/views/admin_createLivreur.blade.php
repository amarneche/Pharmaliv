@extends('header')
@section('content')

<div class="col-sm-12">
        <a href="/home" class="href">Home</a>->
       
</div>
        <div class="col-md-12">
            <div>
                <ul class="nav nav-tabs">
                    <li ><a href="/admin/pharmacie/create" role="tab" data-toggle="tab">Pharmacien </a></li>
                    <li><a href="/admin/medcin/create" role="tab" data-toggle="tab">Medcin </a></li>
                    <li class="active"><a href="/admin/livreur/create" role="tab" data-toggle="tab">Livreur </a></li>
                </ul>
                
            </div>
                   
                            <div class="tab-content">
                                    @if(isset($status))
                                   
                                    <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>{{$status}}</strong> 
                                          </div>
                                        
                                    @endif
                                <div class="tab-pane active" role="tabpanel" id="tab-1">
                                    <h1>Ajouter un Livreur</h1>
                                    
                                    <form  method='post' action="">
                                            {{ csrf_field() }}
                                        <div class='col-sm-12'>
                                            <strong>information :</strong>
                                        </div>
                                            
                                        <div class="col-sm-6 {!!$errors->has('nom') ?'has-error':''!!}">
                                            
                                            <input name="nom" class="form-control" type="text" placeholder="Nom du proprietaire" />
                                            {!!$errors->first('nom',"<small class='help-block'>:message</small>")  !!}
                                        </div>
                                        <div class="col-sm-6 {!!$errors->has('prenom') ?'has-error':''!!}">
                                            <input name="prenom" class="form-control" type="text" placeholder="Prenom du proprietaire" />
                                            {!!$errors->first('prenom',"<small class='help-block'>:message</small>")  !!}
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
            
                                        <div class="col-sm-8 {!!$errors->has('email') ?'has-error':''!!}">
                                            <input name='email' class="form-control" type="email" placeholder="Adresse Email" required/>
                                            {!!$errors->first('email','<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="col-sm-4 {!!$errors->has('mobile') ?'has-error':''!!}">
                                            <input name='mobile' class="form-control" type="text" placeholder="Numero Mobile" />
                                            {!!$errors->first('mobile',"<small class='help-block'>:message</small>")  !!}
                                        </div>
                                        <div class="col-sm-6 {!!$errors->has('password') ?'has-error':''!!}">
                                            <input name ='password' class="form-control" type="password" placeholder="Mot de passe " />
                                            {!!$errors->first('password',"<small class='help-block'>:message</small>")  !!}
                                        </div>
                                        <div class="col-sm-6 ">
                                            <input class="form-control" type="text" placeholder="Confirmez mot de passe " />
                                        </div>
                                        <div class="col-sm-12 {!!$errors->has('adresse') ?'has-error':''!!}">
                                                <input name='adresse'class="form-control" type="text" placeholder="Adresse" />
                                                {!!$errors->first('adresse',"<small class='help-block'>:message</small>")  !!}
                                            </div>
                                        <div class="col-sm-8 col-sm-push-2">
                                                <button class="btn btn-success btn-block" type="submit">
                                                    <i class="glyphicon glyphicon-plus"></i> Creer </button>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
