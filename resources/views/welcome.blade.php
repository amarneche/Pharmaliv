@extends('header')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>PharmaLiv </h1>
            <p>La premiere societe algerienne pour la livraison des medicaments a domicile</p>
        <p><a class="btn btn-success" role="button" href={{route('register')}}>Creer un compte</a>
            <a class="btn btn-danger" role="button" href={{route('login')}}>Se Connecter</a></p>
        </div>
        <hr />
        <div class="jumbotron">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <p class="text-uppercase text-center icon"><i class="fa fa-tachometer icon"></i></p>
                    <h3 class="text-center">Livraison rapide</h3></div>
                <div class="col-lg-4 col-md-4">
                    <p class="text-uppercase text-center icon"><i class="fa fa-map-marker icon"></i></p>
                    <h3 class="text-center">n&#39;importe ou</h3></div>
                <div class="col-lg-4 col-md-4">
                    <p class="text-uppercase text-center icon"><i class="fa fa-medkit icon"></i></p>
                    <h3 class="text-center">Livraison rapide</h3></div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection