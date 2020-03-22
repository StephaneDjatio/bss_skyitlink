@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Installations</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des Installations</li>
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
            Liste des Installations
            </header>
            <table class="table table-striped table-advance table-hover table-bordered">
                <tbody class="text-center">
                    <tr>
                        <th width="5%">#ID</th>
                        <th width="15%">Site</th>
                        <th width="20%">Date Installation</th>
                        <th width="10%">Uploads</th>
                        <th width="10%">Downloads</th>
                        <th width="10%">Signal</th>
                        <th width="10%">Etat</th>
                        <th width="20%"><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @forelse($installations as $installation)
                        <tr>
                            <td>{{$installation->id}}</td>
                            <td>{{$installation->site}}</td>
                            <td>{{date('d-m-Y', strtotime($installation->dateInstall))}}</td>
                            <td>{{$installation->upload}} Mbs</td>
                            <td>{{$installation->download}} Mbs</td>
                            <td>{{$installation->signal}} %</td>
                            @if($installation->statut == 1)
                                <td><i class="label label-warning">En cours</i></td>
                            @endif
                            @if($installation->statut == 2)
                                <td><i class="label label-success">Terminée</i></td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm" href="">Actions</a>
                                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @if($installation->statut == 2)
                                            <li><a href="" id="{{$installation->id}}"><i class="fa fa-edit"></i> Modifier</a></li>
                                            <li class="divider"></li>
                                            <li class="disabled"><a href="" class="installation" id="{{$installation->id}}" data-toggle="modal" data-target="#installationModal"><i class="fa fa-check"></i> Valider</a></li>
                                            <li class="divider"></li>
                                            <li class="disabled"><a href=""><i class="fa fa-times"></i> Annuler</a></li>
                                        @else
                                            <li><a href="" class="installation" id="{{$installation->id}}" data-toggle="modal" data-target="#installationModal"><i class="fa fa-check"></i> Valider</a></li>
                                            <li class="divider"></li>
                                            <li><a href=""><i class="fa fa-times"></i> Annuler</a></li>
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
            <div class="pull-right"></div>
        </section>
    </div>
</div>
<!-- page end-->

<div class="modal fade" id="installationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Installation en cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal " id="installation_form" method="post" action="">
            @csrf
            <input type="hidden" id="id_inst" name="id_inst">
            <div class="form-group ">
                <label for="upload" class="control-label col-lg-3">Upload <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="upload" name="upload" type="text"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="download" class="control-label col-lg-3">Download <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="download" name="download" type="text"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="signal" class="control-label col-lg-3">Signal <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="signal" name="signal" type="text"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="dateInstall" class="control-label col-lg-3">Date Installation <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="dateInstall" name="dateInstall" type="date" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit" id="action">Valider</button>
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
        $('.installation').on('click', function() {
            var install_id = $(this).attr('id');
            if(install_id) {
                var modal = $('#installationModal');
                document.getElementById("installation_form").action = "{{route('installations.store', $menu_id)}}";
                modal.find('.modal-body #id_inst').val(install_id);
                $('#installationModal').modal('show'); 
            } else {
                
            }
        });
    });
</script>
@endsection