@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Planification des installations</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Planifications</li>
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
            Liste des Planifications
            </header>
            <table class="table table-striped table-advance table-hover table-bordered">
                <tbody class="text-center">
                    <tr>
                        <th width="15%">#ID</th>
                        <th width="15%">Equipe d'intervention</th>
                        <th width="20%">Client</th>
                        <th width="15%">Site</th>
                        <th width="15%">Date</th>
                        <th width="20%"><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse($planifications as $planification)
                        <tr>
                            <td>{{$planification->id}}</td>
                            <td><a href="" class="btn btn-info btn-sm equipe" id="{{$planification->idEquipe}}" data-toggle="modal" data-target="#equipeModal">Voir</a></td>
                            <td>{{$planification->nomCli}} {{$planification->prenomCli}}</td>
                            <td>{{$planification->site}}</td>
                            <td>{{date('d-m-Y', strtotime($planification->datePlan))}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm" href="">Actions</a>
                                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @if($planification->statut_install != 2)
                                            <li><a href=""><i class="fa fa-edit"></i> Modifier</a></li>
                                            <li class="divider"></li>
                                            <li><a href=""><i class="fa fa-times"></i> Annuler</a></li>
                                        @else
                                            <li class="disabled"><a href=""><i class="fa fa-edit"></i> Modifier</a></li>
                                            <li class="divider"></li>
                                            <li class="disabled"><a href=""><i class="fa fa-times"></i> Annuler</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7"><h4 class="text-center">Aucune Planification enrégistrée</h4></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">{{$planifications->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->

<div class="modal fade" id="equipeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Equipe d'intervention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h2><b id="titre"></b></h2>
        <table class="table table-striped table-advance table-hover table-bordered">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody id="content">

            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.equipe').on('click', function() {
            var equipe_id = $(this).attr('id');
            if(equipe_id) {
                console.log(equipe_id);
                $.ajax({
                    url: '/equipe',
                    type: 'GET',
                    data:{equipe_id:equipe_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var modal = $('#equipeModal');
                        var content;
                        $.each(data, function(index, value) {
                            content += '<tr>'+
                                '<td>'+value.matriEmp+'</td>'+
                                '<td>'+value.nomEmp+'</td>'+
                                '<td>'+value.prenomEmp+'</td>'+
                                '</tr>';
                        });
                        modal.find('.modal-body #content').html(content);
                        modal.find('.modal-body #titre').html('Equipe d\'intervention');
                        $('#equipeModal').modal('show'); 
                    }
                });
            } else {
                
            }
        });
    });
</script>
@endsection