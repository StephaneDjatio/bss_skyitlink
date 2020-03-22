@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Employés</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des employés</li>
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
            Liste des employés
            </header>

            <table class="table table-striped table-advance table-hover table-bordered">
            <tbody>
                <tr>
                    <th width="10%"><i class="icon_key"></i> #Matricule</th>
                    <th width="15%">Nom & Prénom</th>
                    <th width="10%">Numéro de CNI</th>
                    <th width="15%">Adresse</th>
                    <th width="10%">Téléphone</th>
                    <th width="10%">Poste</th>
                    <th width="15%">Salaire de base</th>
                    <th width="15%"><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($employes as $employe)
                <tr>
                    <td>{{$employe->matriEmp}}</td>
                    <td>{{$employe->nomEmp}} {{$employe->prenomEmp}}</td>
                    <td>{{$employe->numCNI}}</td>
                    <td>{{$employe->adresseEmp}}</td>
                    <td>{{$employe->telephoneEmp}}</td>
                    <td>{{$employe->libellePoste}}</td>
                    <td class="text-center"><b class="text-center badge">{{$employe->salaireDeBase}} FCFA</b></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" href="">Actions</a>
                            <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('employe.edit', $employe)}}">Modifier</a></li>
                                <li class="divider"></li>
                                <li><a class="salaire" href="#" affect="{{$employe->affect}}" id="{{$employe->id}}" data-toggle="modal" data-target="#salaireModal">Salaire</a></li>
                                <li class="divider"></li>
                                <li><a class="affectation" href="#" affect="{{$employe->affect}}" poste="{{$employe->idPoste}}" id="{{$employe->id}}" data-toggle="modal" data-target="#affectationModal">Affectation</a></li>
                                <li class="divider"></li>
                                <li><a href="">Supprimer</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7"><h4 class="text-center">Aucun employé enrégistré</h4></td>
                </tr>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$employes->links()}}</div>
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
            <input type="hidden" id="id_aff" name="id_aff">
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

<div class="modal fade" id="affectationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Affecter à un nouveau poste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-validate form-horizontal " id="affectation_form" method="post" action="">
            @csrf
            <input type="hidden" id="id_emp" name="id_emp">
            <input type="hidden" id="id_aff" name="id_aff">
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
                <label for="poste" class="control-label col-lg-3">Poste d'affectation <span class="required">*</span></label>
                <div class="col-lg-9">
                <select class=" form-control" id="poste" name="poste">

                </select>
                </div>
            </div>
            <div class="form-group ">
                <label for="salaire" class="control-label col-lg-3">Salaire de base <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="salaire" name="salaire" type="text"/>
                </div>
            </div>
            <div class="form-group ">
                <label for="dateaffectation" class="control-label col-lg-3">Date d'affectation <span class="required">*</span></label>
                <div class="col-lg-9">
                <input class=" form-control" id="dateaffectation" name="dateaffectation" type="date"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Affecter</button>
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
        $('.salaire').on('click', function() {
            var employe_id = $(this).attr('id');
            var affect = $(this).attr('affect');
            if(employe_id) {
                console.log(employe_id);
                $.ajax({
                    url: '/employe',
                    type: 'GET',
                    data:{employe_id:employe_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var modal = $('#salaireModal');
                        modal.find('.modal-title').html('Paiement du salaire de '+ data[0].nomEmp +' '+  data[0].prenomEmp);
                        document.getElementById("salary_form").action = "{{route('salaire.store', $menu_id)}}";
                        modal.find('.modal-body #id_emp').val(employe_id);
                        modal.find('.modal-body #id_aff').val(affect);
                        modal.find('.modal-body #matriEmp').val(data[0].matriEmp);
                        modal.find('.modal-body #nomEmp').val(data[0].nomEmp +' '+ data[0].prenomEmp);
                        modal.find('.modal-body #salaire').val(data[0].salaireDeBase);
                        var select1;
                        var select;
                        for(y = 2018; y <= 2030; y++) {
                            var date = new Date();
                            var currentyear = date.getFullYear();
                            if (y == currentyear) {
                                select1 += '<option value="'+y+'" selected>'+y+'</option>';
                            }else{
                                select1 += '<option value="'+y+'">'+y+'</option>';
                            }
                            
                        }

                        var date = new Date();
                        var monthArray = new Array();
                            monthArray[0] = "Janvier";
                            monthArray[1] = "Fevrier";
                            monthArray[2] = "Mars";
                            monthArray[3] = "Avril";
                            monthArray[4] = "Mai";
                            monthArray[5] = "Juin";
                            monthArray[6] = "Juillet";
                            monthArray[7] = "Août";
                            monthArray[8] = "Septembre";
                            monthArray[9] = "Octobre";
                            monthArray[10] = "Novembre";
                            monthArray[11] = "Decembre";
                        for(m = 0; m <= 11; m++) {

                            var month = date.getMonth();
                            // if june selected
                            n = m + 1;
                            if (m == month) {
                                select += '<option value="'+n+'" selected>'+monthArray[m]+'</option>';
                            }else{
                                select += '<option value="'+n+'">'+monthArray[m]+'</option>';
                            }
                        }
                        modal.find('.modal-body #mois').html(select);
                        modal.find('.modal-body #annee').html(select1);
                        $('#salaireModal').modal('show'); 
                    }
                });
            } else {
                
            }
        });

        $('.affectation').on('click', function() {
            var employe_id = $(this).attr('id');
            var poste = $(this).attr('poste');
            var affect = $(this).attr('affect');
            var select ='<option value="">Choisir le nouveau poste d\'affectation</option>';
            if(employe_id) {
                console.log(employe_id);
                $.ajax({
                    url: '/getDatas',
                    type: 'GET',
                    data:{employe_id:employe_id, poste:poste},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var modal = $('#affectationModal');
                        $.each(data.postes, function(index, value) {
                            select += "<option value="+value.id+">"+value.libellePoste+"</option>";
                        });
                        document.getElementById("affectation_form").action = "{{route('employe.affectation', $menu_id)}}";
                        modal.find('.modal-body #id_emp').val(employe_id);
                        modal.find('.modal-body #id_aff').val(affect);
                        modal.find('.modal-body #matriEmp').val(data.employe[0].matriEmp);
                        modal.find('.modal-body #nomEmp').val(data.employe[0].nomEmp +' '+ data.employe[0].prenomEmp);
                        modal.find('.modal-body #poste').html(select);
                        $('#affectationModal').modal('show'); 
                    }
                });
            } else {
                
            }
        });
    });
</script>
@endsection