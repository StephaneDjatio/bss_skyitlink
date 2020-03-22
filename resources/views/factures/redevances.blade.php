@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Redevances</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Redevances</li>
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
            Liste des Redevances
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
                        <th width="20%"> Client</th>
                        <th width="15%">Reference Facture</th>
                        <th width="15%">Montant Global</th>
                        <th width="20%">Date de facturation</th>
                        <th width="15%">Etat</th>
                        <th width="15%"><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse($redevances as $redevance)
                    <tr>
                        <td>{{$redevance->nomCli}} {{$redevance->prenomCli}}</td>
                        <td>{{$redevance->reference}}</td>
                        <td><b>{{$redevance->montant}} FCFA</b></td>
                        <td>{{date('d-m-Y', strtotime($redevance->dateFacturation))}}</td>
                        @if($redevance->statut == 0)
                            <td><i class="label label-danger">Non paye</i></td>
                        @else
                            <td><i class="label label-success">Paye</i></td>
                        @endif
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="">Actions</a>
                                <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="reactivate" href="" id="{{$redevance->id}}" data-toggle="modal" data-target="#suspendModal">Visualiser</a></li>
                                    <li><a class="paiement" href="" id="{{$redevance->id}}" data-montant="{{$redevance->montant}}" data="{{$redevance->reference}}" data-toggle="modal" data-target="#paiementModal">Paiement</a></li>
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
            <div class="pull-right">{{$redevances->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->


<div class="modal fade" id="paiementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal" id="suspend_form" method="post" action="">
            @csrf
            <input type="hidden" id="facture_id" name="facture_id">
            <div class="form-group ">
                <label for="reference" class="control-label col-lg-3">Reference de facture<span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="reference" name="reference" type="text" readonly/>
                </div>
            </div>
            <div class="form-group ">
                <label for="montant" class="control-label col-lg-3">Montant Global<span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="montant" name="montant" type="text" readonly/>
                <input class=" form-control" id="montantPaie" name="montantPaie" type="hidden"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="datePaie" class="control-label col-lg-3">Mode de Paiement <span class="required">*</span></label>
                <div class="col-lg-9">
                <select name="modePaie" class=" form-control" id="modePaie">
                    <option value="">Choisir Mode de Paiement</option>
                    <option value="1">Carte bancaire</option>
                    <option value="2">En espece</option>
                    <option value="3">Mobile Money</option>
                </select>
                </div>
            </div>
            <div class="form-group ">
                <label for="numTransaction" class="control-label col-lg-3">Numero de transaction<span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="numTransaction" name="numTransaction" type="text"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="datePaie" class="control-label col-lg-3">Date de Paiement <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="datePaie" name="datePaie" type="date"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Valider</button>
                <button class="btn btn-default" type="button" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        $('.paiement').on('click', function() {
            var facture_id = $(this).attr('id');
            var facture_ref = $(this).attr('data');
            var montant = $(this).attr('data-montant');
            if(facture_id) {
                var modal = $('#paiementModal');
                modal.find('.modal-title').html('Paiement de la facture');
                document.getElementById("suspend_form").action = "{{route('factures.paiement')}}";
                modal.find('.modal-body #facture_id').val(facture_id);
                modal.find('.modal-body #reference').val(facture_ref);
                modal.find('.modal-body #montant').val(montant+' FCFA');
                modal.find('.modal-body #montantPaie').val(montant);
                $('#paiementModal').modal('show');
            } else {
                
            }
        });
    });
</script>
@endsection