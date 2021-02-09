@extends('frontend.corps')


@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="icon-check_circle display-3 text-success"></span>
                <h2 class="display-3 text-black">Merci!</h2>
                <p class="lead mb-5">Votre commande a été complétée avec succès.</p>
                <p><a href="/shop" class="btn btn-sm btn-primary">Retour à la boutique</a></p>
            </div>
        </div>
    </div>
</div>
    @endsection