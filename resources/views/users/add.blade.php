@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des utilisateurs</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des utilisateurs</li>
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
            Création d'un nouvel utilisateur
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="user_form" method="post" action="{{route('users.store',$menu_id)}}">
                    @csrf
                    <div class="form-group ">
                        <label for="employe" class="control-label col-lg-3">Employe <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="employe" id="employe">
                            <option value="">Choisir Employé</option>
                            @foreach($employes as $employe)
                                <option value="{{$employe->id}}">{{$employe->nomEmp}} {{$employe->prenomEmp}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="profil" class="control-label col-lg-3">Profil <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="profil" id="profil">
                            <option value="">Choisir Profil</option>
                            @foreach($profils as $profil)
                                <option value="{{$profil->id}}">{{$profil->libelleProfil}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-3">Nom d'utilisateur <span class="required"></span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="username" name="username" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="password" class="control-label col-lg-3">Mot de passe <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="password" name="password" type="password" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="confirm_password" class="control-label col-lg-3">Confirmer le mot de passe <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="confirm_password" name="confirm_password" type="password" />
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#employe').on('change', function() {
            var employe_id = this.options[this.selectedIndex].text.replace(' ','');
            //alert(employe_id.toLowerCase());
            $('#username').val(employe_id.toLowerCase());
        });
    });
</script>
@endsection