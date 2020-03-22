@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Clients</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Clients</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @if($confirm == 1)
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                Client enregistree avec success
            </div>
        @endif
        @include('errors')
    </div>

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Liste des Clients
            </header>

            <table class="table table-striped table-advance table-hover table-bordered">
            <tbody>
                <tr>
                    <th width="10%"><i class="icon_key"></i> #Code du client</th>
                    <th width="15%">Nom & Prénom</th>
                    <th width="15%">Adresse</th>
                    <th width="10%">Téléphone</th>
                    <th width="10%">Adresse Mail</th>
                    <th width="15%">Nom Utilisateur</th>
                    <th width="15%"><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($clients as $client)
                <tr>
                    <td>{{$client->codeCli}}</td>
                    <td>{{$client->nomCli}} {{$client->prenomCli}}</td>
                    <td>{{$client->adresseCli}}</td>
                    <td>{{$client->telCli}}</td>
                    <td>{{$client->mailCli}}</td>
                    <td>{{$client->nomUtilisateur}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" href="">Actions</a>
                            <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('clients.edit', $client)}}">Modifier</a></li>
                                <li class="divider"></li>
                                <li><a href="">Mes factures</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('clients.souscriptions', $client)}}">Mes souscriptions</a></li>
                                <li class="divider"></li>
                                <li><a href="">Mes paiements</a></li>
                                <li class="divider"></li>
                                <li><a href="">Supprimer</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7"><h4 class="text-center">Aucun client enrégistré</h4></td>
                </tr>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$clients->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->

<!-- Modal -->
<div class="modal fade" id="salaireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal " id="salary_form" method="post" action="">
            @csrf
            <input type="hidden" id="id_emp" name="id_emp">
            <div class="form-group ">
                <label for="matriEmp" class="control-label col-lg-3">Matricule <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="matriEmp" name="matriEmp" type="text" readonly/>
                </div>
            </div>
            <div class="form-group ">
                <label for="nomEmp" class="control-label col-lg-3">Nom et Prénom <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="nomEmp" name="nomEmp" type="text" readonly/>
                </div>
            </div>
            <div class="form-group ">
                <label for="salaire" class="control-label col-lg-3">Salaire de base <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="salaire" name="salaire" type="text" readonly/>
                </div>
            </div>
            <div class="form-group ">
                <label for="prime" class="control-label col-lg-3">Prime <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="prime" name="prime" type="text"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="mois" class="control-label col-lg-3">Mois <span class="required">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" name="mois" id="mois">
                            <option value="">Choisir le mois</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="annee" class="control-label col-lg-3">Année <span class="required">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" name="annee" id="annee">
                            <option value="">Choisir l'année</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="datePaiement" class="control-label col-lg-3">Date de Paiement <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="datePaiement" name="datePaiement" type="date"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
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
    });
</script>
@endsection