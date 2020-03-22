@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Postes</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Postes</li>
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
            Nos Postes
            </header>

            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_key"></i> #ID</th>
                    <th><!--<i class="icon_calendar"></i>--> Poste</th>
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($postes as $poste)
                <tr>
                    <td>{{$poste->id}}</td>
                    <td>{{$poste->libellePoste}}</td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary edit" id="{{$poste->id}}" href="javascript:;"><i class="fa fa-edit"></i></a>
                        <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="3"><h4 class="text-center">Pas de poste définie</h4></td>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$postes->links()}}</div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading" id="title">
            Création d'un nouveau poste
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="poste_form" method="post" action="{{route('postes.store',$menu_id)}}">
                    @csrf
                    <input type="hidden" id="poste_id" name="poste_id">
                    <div class="form-group ">
                        <label for="poste" class="control-label col-lg-3">Libellé poste <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="poste" name="poste" type="text" />
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
            } else {
                $('select[name="city_id"]').empty();
            }
        });
    });
</script>
@endsection