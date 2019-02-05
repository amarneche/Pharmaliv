@extends('header')

@section('content')
<div class="row col-sm-push-2">
    <div class="col-sm-10 col-sm-push-2">
    <div class="col-sm-3 col-xs-6 ">
        <a href="/livreur/commandes" class="href">
        <div class="thumbnail">
                <div class="caption">
                        <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                        <hr />
                        <h4 class="text-uppercase text-center">Mes Commandes</h4>
                </div>
        </div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 ">
            <a href="/livreur/editProfile" class="href">
            <div class="thumbnail">
                    <div class="caption">
                            <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                            <hr />
                            <h4 class="text-uppercase text-center">Mon profil</h4>
                    </div>
            </div>
            </a>
        </div>

    </div>
</div>


@endsection