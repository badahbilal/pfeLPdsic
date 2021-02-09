@extends('frontend.corps')


@section('content')



    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Acceuil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Mes Commandes</strong></div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 border-top">
<div class="row">
  <div class="offset-1 col-10">
      <table id="mesComandes" class="display table table-striped " style="width:100%">
          <thead>
          <tr>
              <th>N commande</th>
              <th>Mantant total</th>
              <th>Date de la commande</th>
              <th>Edat de la commande</th>
              <th>Confirmer le reçu</th>

          </tr>
          </thead>
          <tbody>
          @foreach($commandes as $commande)
          <tr>
              <td>{{$commande->idCom}}</td>
              <td>{{$commande->mantTotalCom}}</td>
              <td>{{$commande->dateCom}}</td>
              <td>
                  @if($commande->etatCom == 2)
                      <span class="badge badge-success" style="display: inline-block;padding: 11px;">Commande Livré</span>
                  @elseif($commande->etatCom == 1)
                      <span class="badge badge-warning" style="display: inline-block;padding: 11px;">Commande Envoyé</span>
                  @elseif($commande->etatCom == 0)
                      <span class="badge badge-danger" style="display: inline-block;padding: 11px;">Commande No Livré</span>


                  @endif</td>
              <td>
                  @if($commande->etatCom==1)

                      <a href="{{'/mescommandes/valider/'.$commande->idCom}}" >
                          <button onclick="return confirm('Voullez vous veraiment valider?')" class="btn btn-success"  >
                              <span class="glyphicon glyphicon-plus-sign"></span>
                              Commande recu
                          </button>
                      </a>

                  @endif
              </td>
          </tr>

          @endforeach

          </tbody>
          <tfoot>
          <tr>
              <th>N commande</th>
              <th>Mantant total</th>
              <th>Date de la commande</th>
              <th>Edat de la commande</th>
              <th>Confirmer le reçu</th>
          </tr>
          </tfoot>
      </table>
  </div>
</div>
</div>

@endsection