@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Employés</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Modifier employé</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @include('errors')
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" id="title">
            Modifier les données de l'employé
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="employe_form" method="post" action="{{route('employe.update',$employe)}}">
                    @csrf
                    <div class="form-group ">
                        <label for="matricule" class="control-label col-lg-3">Matricule <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="matricule" name="matricule" type="text" value="{{$employe->matriEmp}}" readonly />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="nom" class="control-label col-lg-3">Nom <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="nom" name="nom" type="text" value="{{$employe->nomEmp}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="prenom" class="control-label col-lg-3">Prénom <span class="required"></span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="prenom" name="prenom" type="text" value="{{$employe->prenomEmp}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="adresse" class="control-label col-lg-3">Adresse <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="adresse" name="adresse" type="text" value="{{$employe->adresseEmp}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cni" class="control-label col-lg-3">Numéro de CNI <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="cni" name="cni" type="text" value="{{$employe->numCNI}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="telephone" class="control-label col-lg-3">Numéro Téléphone <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="telephone" name="telephone" type="text" value="{{$employe->telephoneEmp}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="salaire" class="control-label col-lg-3">Salaire de base <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="salaire" name="salaire" type="text" value="{{$employe->salaireDeBase}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="poste" class="control-label col-lg-3">Poste <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="poste" id="poste">
                            <option value="">Choisir Poste</option>
                            @foreach($postes as $poste)
                                @if($employe->idPoste == $poste->id)
                                    <option value="{{$poste->id}}" selected>{{$poste->libellePoste}}</option>
                                @else
                                    <option value="{{$poste->id}}">{{$poste->libellePoste}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" id="action">Modifier</button>
                        <button class="btn btn-danger" type="button">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.edit').on('click', function() {
            var poste_id = $(this).attr('id');
            if(poste_id) {
                console.log(poste_id);
                $.ajax({
                    url: '/postes',
                    type: 'GET',
                    data:{poste_id:poste_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data[0].libellePoste);
                        $('#title').html('Modifier Poste');
                        $('#poste_id').val(data[0].id);
                        $('#poste').val(data[0].libellePoste);
                        $('#action').html('Modifier');
                    }
                });
            }
        });
    });
</script>
@endsection