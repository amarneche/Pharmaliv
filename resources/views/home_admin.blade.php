@extends('header')

@section('content')
<div class="row col-sm-push-2">
    <div class="col-sm-10 col-sm-push-2">
    <div class="col-sm-3 col-xs-6 ">
        <a href="/admin/pharmacie/create" class="href">
        <div class="thumbnail">
                <div class="caption">
                        <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                        <hr />
                        <h4 class="text-uppercase text-center">Creer Pharmacie</h4>
                </div>
        </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6 ">
        <a href="/admin/medcin/create" class="href">
            <div class="thumbnail">
                    <div class="caption">
                            <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                            <hr/>
                            <h4 class="text-uppercase text-center">Creer Medcin</h4>
                    </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6 ">
        <a href="/admin/livreur/create" class="href">
            <div class="thumbnail">
                    <div class="caption">
                            <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                            <hr/>
                            <h4 class="text-uppercase text-center">Creer Livreur</h4>
                    </div>
            </div>
        </a>
    </div>
</div>
<div class="col-sm-10 col-sm-push-2">
    <div class="col-md-3 col-xs-6 ">
        <a href="/admin/commandes" class="href">
            <div class="thumbnail">
                    <div class="caption">
                            <p class="text-uppercase text-center icon"><i class="fa fa-user-plus icon"></i></p>
                            <hr/>
                            <h4 class="text-uppercase text-center">Commandes</h4>
                    </div>
            </div>
        </a>
    </div>
    
</div>
</div>


@endsection