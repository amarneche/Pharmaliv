@extends('header')

@section('content')
<a href='/home'>Home </a>-> <a href='/pharmacies' class='active'>Lise des pharmacies</a> </br> 
Liste Des pharmacies :
<div class="row">
  

    @foreach($results as $result)
    
        <div class="col-sm-2 col-xs-4">
       
            <div class="thumbnail" style='margin-bottom:0px'>
            <a href='/pharmacie/{{$result->id}}'>
                <img class='doctorImg'src='{{asset('images/images.jpg')}}'>
                <div class="caption">
                
                    <h5 class="text-center"><strong>{{$result->nom}}</strong></h5>
                    <hr>
                    
                    <p><strong><i class="fa fa-phone-square"></i> </strong>{{$result->mobile}} </p>
                    <p><i class="fa fa-location-arrow"></i> : {{$result->adresse}}</p>
                    
                </div>
                
            </a>
            
            </div>
            @if($result->id!=$defaultPharmacie)
            <form method="POST" action='/setdefaultPharmacie/{{$result->id}}'>
            <div class="input-group-btn">
                {{ csrf_field() }}
            <button onclick="e.preventDefault()" class="btn btn-success btn-sm btn-block"><span>Met par default</span></button>
            </div>
            @endif
            </form>
        </div>
    
   
    @endforeach


@endsection