@extends('header')
@section('content')



      <div class='col-sm-12'>  
          <a href="/home">Home</a> -><a href='/pharmacie/edit'>pharmacie</a>
        @if(isset($status))
       
        <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{$status}}</strong> 
        </div>
            
        @endif
        
            
              <h3>Modifier votre profile </h3> 
             <h4><strong> {{Auth::user()->nom.' '.Auth::user()->prenom}}</strong> </h4>
             
    </div>                  
              
        <form  method='post' action="">
                {{ csrf_field() }}
            <div class='col-sm-12'>
                <strong>information a propos du proprietaire </strong>
            </div>
                
            <div class="col-sm-6 {!!$errors->has('nom') ?'has-error':''!!}">
                
            <input name="nom" class="form-control" type="text" placeholder="Nom :{{Auth::user()->nom}}" />
                {!!$errors->first('nom',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-6 {!!$errors->has('prenom') ?'has-error':''!!}">
                <input name="prenom" class="form-control" type="text" placeholder="Prenom :{{Auth::user()->prenom}}" />
                {!!$errors->first('prenom',"<small class='help-block'>:message</small>")  !!}
            </div>

            <div class='col-md-6 {!!$errors->has('age')?'has-error' :''!!}'>
                    <input class="form-control input" type='text' name='age' placeholder ='Age : {{Auth::user()->age}} ans'>
            </div>

            <div class="col-sm-8 {!!$errors->has('email') ?'has-error':''!!}">
                <input name='email' class="form-control" type="text" placeholder="Email :{{Auth::user()->email}}" />
                {!!$errors->first('email','<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-sm-4 {!!$errors->has('mobile') ?'has-error':''!!}">
                <input name='mobile' class="form-control" type="text" placeholder="Mobile : {{Auth::user()->mobile}}" />
                {!!$errors->first('mobile',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-6 {!!$errors->has('password') ?'has-error':''!!}">
                <input name ='password' class="form-control" type="text" placeholder="Mot de passe " />
                {!!$errors->first('password',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-6 ">
                <input class="form-control" type="text" placeholder="Confirmez mot de passe " />
            </div>
            <div class='col-sm-12'>
                    <strong>information a propos du pharmacie </strong>
            </div>
            <div class="col-sm-12 {!!$errors->has('adresse') ?'has-error':''!!}">
                <input name='adresse'class="form-control" type="text" placeholder=" Adresse : {{$user->adresse}} "/>
                {!!$errors->first('adresse',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div  class="col-sm-12">
            <input name='position' class="form-control" type="text" placeholder="Position Sur Maps : {{$user->positionGPS}}" />
            </div>
            <div class="col-sm-3 {!!$errors->has('ouvreA') ?'has-error':''!!}">
                <input name='ouvreA'class="form-control" type="number" placeholder="Ouvre a :{{$user->ouvreA}} " />
                {!!$errors->first('ouvreA',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-3 {!!$errors->has('fermeA') ?'has-error':''!!}">
                <input name='fermeA'class="form-control" type="number" placeholder="Ferme a : {{$user->fermeA}}" />
                {!!$errors->first('fermeA',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-6 {!!$errors->has('journeeLibre') ?'has-error':''!!}">
                <select name='journeeLibre' class="form-control">
                    <optgroup label="Journee Libre">
                        <option value="Samedi">Samedi</option>
                        <option value="Dimanche">Dimanche</option>
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi" selected>Vendredi</option>
                    </optgroup>
                </select>
                {!!$errors->first('journeeLibre',"<small class='help-block'>:message</small>")  !!}
            </div>
            <div class="col-sm-8 col-sm-push-2">
                <button class="btn btn-success btn-block" type="submit">
                    <i class="glyphicon glyphicon-plus"></i> Sauvgarder les infos    </button>
            </div>
        </form>


@endsection