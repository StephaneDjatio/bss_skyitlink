@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des profils utilisateurs</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des profils utilisateurs</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @include('errors')
    </div>

    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
            Gestion des profils utilisateurs
            </header>

            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_key"></i> #ID</th>
                    <th><!--<i class="icon_calendar"></i>--> Profils</th>
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($profiles as $profil)
                <tr>
                    <td>{{$profil->id}}</td>
                    <td>{{$profil->libelleProfil}}</td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary edit" id="{{$profil->id}}" href="javascript:;"><i class="fa fa-edit"></i></a>
                        <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="3"><h4 class="text-center">Pas de Profil définie</h4></td>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$profiles->links()}}</div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading" id="title">
            Création d'un nouveau profil
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="profil_form" method="post" action="{{route('profiles.store',$menu_id)}}">
                    @csrf
                    <input type="hidden" id="profil_id" name="profil_id">
                    <div class="form-group ">
                        <label for="profil" class="control-label col-lg-3">Profil <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="profil" name="profil" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <h5 class="col-lg-12">Modules:</h5>
                        <div class="col-lg-9">
                            <input class="" id="module1" name="module[]" type="checkbox" value="1"/>&nbsp; Gestion des clients <br>
                            <input class="" id="module2" name="module[]" type="checkbox" value="2"/>&nbsp; Facturation et Encaissements <br>
                            <input class="" id="module3" name="module[]" type="checkbox" value="3"/>&nbsp; Gestion des souscriptions <br>
                            <input class="" id="module4" name="module[]" type="checkbox" value="4"/>&nbsp; Gestion des installations <br>
                            <input class="" id="module5" name="module[]" type="checkbox" value="5"/>&nbsp; Gestion des produits & Services <br>
                            <input class="" id="module6" name="module[]" type="checkbox" value="6"/>&nbsp; Gestion du personnel <br>
                            <input class="" id="module7" name="module[]" type="checkbox" value="7"/>&nbsp; Gestion des comptes utilisateurs <br>
                            <input class="" id="module8" name="module[]" type="checkbox" value="8"/>&nbsp; Gestion des tickets<br>
                            <input class="" id="module9" name="module[]" type="checkbox" value="9"/>&nbsp; Gestion des stocks <br>
                            <input class="" id="module10" name="module[]" type="checkbox" value="10"/>&nbsp; Gestion des packages 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" id="action">Enregistrer</button>
                        <button class="btn btn-default" type="button">Annuler</button>
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
            var profil_id = $(this).attr('id');
            if(profil_id) {
                console.log(profil_id);
                $.ajax({
                    url: '/profil',
                    type: 'GET',
                    data:{profil_id:profil_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data[0].libelleProfil);
                        $('#title').html('Modifier Poste');
                        $('#profil_id').val(data[0].id);
                        $('#profil').val(data[0].libelleProfil);
                        $('#action').html('Modifier');
                    }
                });
            }
        });
    });
</script>
@endsection