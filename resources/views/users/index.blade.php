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
            <header class="panel-heading">
            Gestion des utilisateurs
            </header>
            <table class="table table-striped table-advance table-hover table-bordered">
                <thead class="text-center">
                    <tr>
                        <th><i class="icon_key"></i> #Matricule</th>
                        <th>Nom & Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Profil</th>
                        <th><i class="icon_calendar"></i> Date de création</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-center">
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->matriEmp}}</td>
                            <td>{{$user->nomEmp}} {{$user->prenomEmp}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->libelleProfil}}</td>
                            <td><b class="bg-danger">{{$user->created_at}}</b></td>
                            <td>
                                <div class="btn-group">
                                <a class="btn btn-primary edit" id="{{$user->id}}" href="#" data-toggle="modal" data-target="#editUser"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-success" href="#" title="Réinitialiser le mot de passe"><i class="fa fa-lock"></i></a>
                                <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8"><h4 class="text-center">Aucun Compte enrégistré</h4></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">{{$users->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->

<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier le profil utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-validate form-horizontal " id="user_form" method="post" action="{{route('users.store',$menu_id)}}">
                @csrf
                <input type="hidden" name="user_id" id="user_id">
                <div class="form-group ">
                    <label for="profil" class="control-label col-lg-3">Profil <span class="required">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" name="profil" id="profil">
                            <option value="">Choisir Profil</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                        <button class="btn btn-default" type="button" data-dismiss="modal">Fermer</button>
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
        $('.edit').on('click', function() {
            var user_id = $(this).attr('id');
            if(user_id) {
                console.log(user_id);
                $.ajax({
                    url: '/user',
                    type: 'GET',
                    data:{user_id:user_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var modal = $('#editUser');
                        modal.find('.modal-title').html('Modifier le profil de '+ data.user[0].name);
                        document.getElementById("user_form").action = "{{route('users.update',"+data.user[0].id+")}}";
                        modal.find('.modal-body #user_id').val(user_id);
                        $('select[name="profil"]').empty();
                        $.each(data.profils, function(key, value) {
                            if(value.id == data.user[0].idProfil) {
                                $('select[name="profil"]').append('<option value='+ value.id +' selected>' + value.libelleProfil + '</option>' );
                            }else{
                                $('select[name="profil"]').append('<option value='+ value.id +'>' + value.libelleProfil + '</option>' );
                            }
                        });
                        $('#editUser').modal('show'); 
                    }
                });
            } else {
                
            }
        });
    });
</script>
@endsection