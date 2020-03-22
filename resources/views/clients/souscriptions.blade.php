@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Souscriptions de <b>{{$client->nomCli}} {{$client->prenomCli}}</b></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Souscriptions</li>
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
            Liste des Souscriptions
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
                        <th width="10%"> Code Client</th>
                        <th width="15%"> Client</th>
                        <th width="10%">Service</th>
                        <th width="10%">Site</th>
                        <th width="15%">Date de Debut</th>
                        <th width="15%">Date de Fin</th>
                        <th width="10%">Etat</th>
                        <th width="15%"><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse($souscriptions as $souscription)
                    <tr>
                        <td>{{$souscription->codeCli}}</td>
                        <td>{{$souscription->nomCli}} {{$souscription->prenomCli}}</td>
                        <td>{{$souscription->libelleService}}</td>
                        <td>{{$souscription->site}}</td>
                        @if($souscription->dateDeb != null)
                            <td>{{date('d-m-Y', strtotime($souscription->dateDeb))}}</td>
                        @else
                            <td><i class="text-danger">Not defined</i></td>
                        @endif
                        @if($souscription->dateFin != null)
                            <td>{{date('d-m-Y', strtotime($souscription->dateFin))}}</td>
                        @else
                            <td><i class="text-danger">Not defined</i></td>
                        @endif
                        @if($souscription->statut == 0)
                            <td><i class="label label-warning">En attente</i></td>
                        @elseif($souscription->statut == 1)
                            <td><i class="label label-success">Active</i></td>
                        @elseif($souscription->statut == 2)
                            <td><i class="label label-danger">Termine</i></td>
                        @elseif($souscription->statut == 3)
                            <td><i class="label label-danger">Suspendu</i></td>
                        @endif
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="">Actions</a>
                                <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @if($souscription->statut == 0)
                                    <li><a href="">Modifier</a></li>
                                    <li class="divider"></li>
                                    <li><a class="validation" href="" id="{{$souscription->id}}" data-toggle="modal" data-target="#validateModal">Valider</a></li>                        
                                    @endif
                                    @if($souscription->statut == 1)
                                    <li><a class="suspension" href="" id="{{$souscription->id}}" data-toggle="modal" data-target="#suspendModal">Suspendre</a></li>
                                    <li class="divider"></li>
                                    <li><a href="">Terminer</a></li>
                                    @endif
                                    @if($souscription->statut == 0)
                                    <li class="divider"></li>
                                    <li><a href="">Supprimer</a></li>                        
                                    @endif
                                    @if($souscription->statut == 3)
                                    <li><a class="reactivate" href="" id="{{$souscription->id}}" data-toggle="modal" data-target="#suspendModal">Reactiver</a></li>                        
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7"><h4 class="text-center">Aucune souscription enrégistré</h4></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">{{$souscriptions->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->

<!-- Modal -->
<div class="modal fade" id="validateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Valider une souscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal " id="validate_form" method="post" action="">
            @csrf
            <input type="hidden" id="souscription_id" name="souscription_id">
            <div class="form-group ">
                <label for="codeClient" class="control-label col-lg-3">Code du client <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="codeClient" name="codeClient" type="text" readonly/>
                </div>
            </div>
            <div class="form-group ">
                <label for="dateDeb" class="control-label col-lg-3">Date de debut <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="dateDeb" name="dateDeb" type="date"/>
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

<div class="modal fade" id="suspendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal" id="suspend_form" method="post" action="">
            @csrf
            <input type="hidden" id="souscription_id" name="souscription_id">
            <p id="contentText" class="text-danger"></p>
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
        $('.validation').on('click', function() {
            var souscription_id = $(this).attr('id');
            if(souscription_id) {
                console.log(souscription_id);
                $.ajax({
                    url: '/client/get',
                    type: 'GET',
                    data:{souscription_id:souscription_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var modal = $('#validateModal');
                        modal.find('.modal-title').html('Validation de la souscription de '+ data[0].nomCli +' '+  data[0].prenomCli);
                        document.getElementById("validate_form").action = "{{route('souscription.validate')}}";
                        modal.find('.modal-body #souscription_id').val(souscription_id);
                        modal.find('.modal-body #codeClient').val(data[0].codeCli);
                        $('#validateModal').modal('show'); 
                    }
                });
            } else {
                
            }
        });

        $('.suspension').on('click', function() {
            var souscription_id = $(this).attr('id');
            if(souscription_id) {
                var modal = $('#suspendModal');
                modal.find('.modal-title').html('Suspendre Cette souscription');
                modal.find('#contentText').html('Voulez-vous suspendre cette souscription ?');
                document.getElementById("suspend_form").action = "{{route('souscription.suspend')}}";
                modal.find('.modal-body #souscription_id').val(souscription_id);
                $('#suspendModal').modal('show');
            } else {
                
            }
        });

        $('.reactivate').on('click', function() {
            var souscription_id = $(this).attr('id');
            if(souscription_id) {
                var modal = $('#suspendModal');
                modal.find('.modal-title').html('Reactiver le client');
                modal.find('#contentText').html('Voulez-vous reactiver cette souscription ?');
                document.getElementById("suspend_form").action = "{{route('souscription.reactivate')}}";
                modal.find('.modal-body #souscription_id').val(souscription_id);
                $('#suspendModal').modal('show');
            } else {
                
            }
        });
    });
</script>
@endsection