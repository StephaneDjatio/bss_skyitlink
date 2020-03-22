@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Employés</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Nouvel employé</li>
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
            Création d'un nouvel employé
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="employe_form" method="post" action="{{route('employe.store',$menu_id)}}">
                    @csrf
                    <div class="form-group ">
                        <label for="matricule" class="control-label col-lg-3">Matricule <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="matricule" name="matricule" type="text" value="{{$matricule}}" readonly />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="nom" class="control-label col-lg-3">Nom <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="nom" name="nom" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="prenom" class="control-label col-lg-3">Prénom <span class="required"></span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="prenom" name="prenom" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="adresse" class="control-label col-lg-3">Adresse <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="adresse" name="adresse" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cni" class="control-label col-lg-3">Numéro de CNI <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="cni" name="cni" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="telephone" class="control-label col-lg-3">Numéro Téléphone <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="telephone" name="telephone" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="salaire" class="control-label col-lg-3">Salaire de base <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="salaire" name="salaire" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="poste" class="control-label col-lg-3">Poste <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="poste" id="poste">
                            <option value="">Choisir Poste</option>
                            @foreach($postes as $poste)
                                <option value="{{$poste->id}}">{{$poste->libellePoste}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" id="action">Enregistrer</button>
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
