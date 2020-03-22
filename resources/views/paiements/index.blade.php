@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Paiements</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Paiements</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    @include('errors')
    </div>

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Liste des Paiements
            </header><br>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <div class="col-lg-3">
                        <label for="critere"><b>Recherche</b></label>
                    </div>
                    <div class="col-lg-9">
                        <select name="critere" id="critere" class="form-control">
                            <option value="">Choisir le critere</option>
                            <option value="1">Nom</option>
                            <option value="2">Prenom</option>
                            <option value="3">Site</option>
                            <option value="4">Date de debut</option>
                            <option value="5">Date de fin</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <input type="text" name="search" class="form-control" placeholder="Saisir valeur de recherche">
                </div>
            </div>
            <br><br>
            <table class="table table-striped table-advance table-hover table-bordered">
                <tbody class="text-center">
                    <tr>
                        <th width="15%">Reference Facture</th>
                        <th width="15%">Mode de paiement</th>
                        <th width="20%">Numero de transaction</th>
                        <th width="15%">Date de paiement</th>
                        <th width="15%">Montant paiement</th>
                        <th width="20%"><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse($paiements as $paiement)
                    <tr>
                        <td>{{$paiement->reference}}</td>
                        @if($paiement->idTypeFact == 1)
                            <td>Carte bancaire</td>
                        @elseif($paiement->idTypeFact == 2)
                            <td>En espece</td>
                        @else
                            <td>Mobile Money</td>
                        @endif
                        <td>{{$paiement->transaction}}</td>
                        <td>{{date('d-m-Y', strtotime($paiement->datePaie))}}</td>
                        <td><b>{{$paiement->montantPaie}} FCFA</b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="">Actions</a>
                                <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="imprimer" href="" id="{{$paiement->id}}" 
                                    adresseCli="{{$paiement->adresseCli}}" 
                                    libelleServ="{{$paiement->libelleService}}"
                                    transaction="{{$paiement->transaction}}"
                                    montantPaie="{{$paiement->montantPaie}}"
                                    client="{{$paiement->nomCli}} {{$paiement->prenomCli}}" codeClient="{{$paiement->codeCli}}"
                                    factureClient="{{$paiement->reference}}" data-toggle="modal" 
                                    datePaie="{{date('d-m-Y', strtotime($paiement->datePaie))}}" data-target="#paiementModal"
                                    dateop="{{date('d-m-Y H:m:s', strtotime($paiement->created_at))}}"
                                    employe="{{$paiement->nomEmp}} {{$paiement->prenomEmp}}">Imprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7"><h4 class="text-center">Aucune Facture enrégistré</h4></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">{{$paiements->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->

<div class="modal fade" id="paiementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recu de paiement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-advance table-hover table-bordered">
            <thead>
                <tr>
                    <th>
                        <img src="{{ asset('assets/img/logo.png')}}" height="60px" alt="">
                    </th>
                    <th colspan="2">
                        <p><u>Date de Paiement</u> : <b id="datePaie"></b></p>
                        <p><u>Reference Facture</u> : <b id="referenceFact"></b></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <p><u>Operateur</u> : <b id="employe"></b></p>
                        <p><u>Date operation</u> : <b id="dateOp"></b></p>
                    </th>
                    <th>
                        <p><u>Code</u> : <b id="codeClient"></b></p>
                        <p><u>Client</u> : <b id="clientName"></b></p>
                        <p><u>Adresse</u> : <b id="adresseCli"></b></p>
                    </th>
                </tr>
                <tr>
                    <th>Reference Facture</th>
                    <th>Numero Transaction</th>
                    <th>Montant paiement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b id="reference"></b></td>
                    <td><b id="transaction"></b></td>
                    <td><b id="montant" class="pull-right"></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Client</td>
                    <td></td>
                    <td>Operateur</td>
                </tr>
                <tr>
                    <td rowspan="3" colspan="3"><br><br></td>
                </tr>
            </tbody>
            <tfoot>
                <th colspan="3" class="text-center">
                    <img src="{{ asset('assets/img/footer_fac.png')}}" height="100px" alt="">
                </th>
            </tfoot>
        </table>
      </div>
      <div class="modal-footer text-center">
          <button class="btn btn-success">Imprimer</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $('.imprimer').on('click', function() {
            var facture = $(this).attr('factureClient');
            var codeClient = $(this).attr('codeClient');
            var client = $(this).attr('client');
            var datePaie = $(this).attr('datePaie');
            var dateOp = $(this).attr('dateOp');
            var employe = $(this).attr('employe');
            var adresseCli = $(this).attr('adresseCli');
            var transaction = $(this).attr('transaction');
            var montantPaie = $(this).attr('montantPaie');
            var modal = $('#paiementModal');
            modal.find('.modal-title').html('Recu de paiement');
            modal.find('.modal-body #referenceFact').html(facture);
            modal.find('.modal-body #clientName').html(client);
            modal.find('.modal-body #codeClient').html(codeClient);
            modal.find('.modal-body #datePaie').html(datePaie);
            modal.find('.modal-body #dateOp').html(dateOp);
            modal.find('.modal-body #employe').html(employe);
            modal.find('.modal-body #adresseCli').html(adresseCli);
            modal.find('.modal-body #reference').html(facture);
            modal.find('.modal-body #transaction').html(transaction);
            modal.find('.modal-body #montant').html(montantPaie+' FCFA');
            $('#paiementModal').modal('show');
        });
    });
</script>
@endsection