@extends('header')

@section('content')

<div class="col-md-6 col-md-push-3">
    <div class="jumbotron">
        <h2 class="text-center"><i class="fa fa-sign-in"></i> Connectez vous</h2>
        {{Form::open(['url'=>'login'])}}
            <div class="form-group"></div>
            <div class="form-group row">
                <div class="col-md-12 {!!$errors->has('email') ?'has-error':''!!}">
                    {{Form::text('email',null,['placeholder'=>'Entrez votre Email','required'=>'true', 'class'=>'form-control input col-md-6']) }}
                    {!!$errors->first('email','<small class="help-block">:message</small>') !!}
                </div>
                <div class="col-md-12 {!! $errors->has('password') ?'has-error' :'' !!}}">
                   
                    {{Form::password('password',['placeholder'=>'**********','required'=>'true','class'=>'form-control input col-md-6'])}}
                </div>
            </div>
            <button class="btn btn-success btn-block btn-sm" type="submit"><i class="fa fa-sign-in"></i> Se Connecter</button>
        <a class="btn btn-link btn-block btn-sm" role="button" href={{route('register')}}><i class="fa fa-user-plus"></i> S'inscrire </a>
        {{Form::close()}}
    </div>
</div>
@endsection
