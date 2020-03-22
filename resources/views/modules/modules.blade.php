@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des modules</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des modules</li>
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
            Gestion des modules
            </header>

            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_key"></i> #ID</th>
                    <th><!--<i class="icon_calendar"></i>--> Modules</th>
                    <th><!--<i class="icon_calendar"></i>--> icônes</th>
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($modules as $module)
                <tr>
                    <td>{{$module->id}}</td>
                    <td>{{$module->module}}</td>
                    <td><i class="{{$module->icon}}"></i></td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary edit" id="{{$module->id}}" href="javascript:;"><i class="fa fa-edit"></i></a>
                        <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="3"><h4 class="text-center">Aucun Module Enregristré</h4></td>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$modules->links()}}</div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading" id="title">
            Création d'un nouveau module
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="module_form" method="post" action="{{route('modules.store',$menu_id)}}">
                    @csrf
                    <input type="hidden" id="module_id" name="module_id">
                    <div class="form-group ">
                        <label for="module" class="control-label col-lg-3">Module <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="module" name="module" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="color" class="control-label col-lg-3">Couleur <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="color" name="color" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="icon" class="control-label col-lg-3">Icônes <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="icon" name="icon" type="text" />
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
            var module_id = $(this).attr('id');
            if(module_id) {
                console.log(module_id);
                $.ajax({
                    url: '/modules',
                    type: 'GET',
                    data:{module_id:module_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data[0].module);
                        $('#title').html('Modifier Module');
                        $('#module_id').val(data[0].id);
                        $('#module').val(data[0].module);
                        $('#color').val(data[0].couleur);
                        $('#icon').val(data[0].icon);
                        $('#action').html('Modifier');
                    }
                });
            }
        });
    });
</script>
@endsection