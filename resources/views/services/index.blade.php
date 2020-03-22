@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des services</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des services</li>
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
            Gestion des services
            </header>

            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_key"></i> #ID</th>
                    <th><!--<i class="icon_calendar"></i>--> Service</th>
                    <th><!--<i class="icon_calendar"></i>--> Montant</th>
                    <th><!--<i class="icon_calendar"></i>--> Type</th>
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->libelleService}}</td>
                    <td>{{$service->montant}} FCFA</td>
                    <td>{{$service->libelleTypeService}}</td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary edit" id="{{$service->id}}" href="javascript:;"><i class="fa fa-edit"></i></a>
                        <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="3"><h4 class="text-center">Pas de service défini</h4></td>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$services->links()}}</div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading" id="title">
            Création d'un nouveau service
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="service_form" method="post" action="{{route('services.store',$menu_id)}}">
                    @csrf
                    <input type="hidden" id="service_id" name="service_id">
                    <div class="form-group ">
                        <label for="type" class="control-label col-lg-3">Type Service <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select name="type" id="type" class="form-control">
                            <option value="">Choisir le type de service</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->libelleTypeService}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="service" class="control-label col-lg-3">Libellé Service <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="service" name="service" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="montant" class="control-label col-lg-3">Montant <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="montant" name="montant" type="text" />
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
            var service_id = $(this).attr('id');
            if(service_id) {
                console.log(service_id);
                $.ajax({
                    url: '/service',
                    type: 'GET',
                    data:{service_id:service_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.service[0].libelleService);
                        $('#title').html('Modifier Service');
                        $('#service_id').val(data.service[0].id);
                        $('#service').val(data.service[0].libelleService);
                        $('#montant').val(data.service[0].montant);
                        $('select[name="type"]').empty();
                        $.each(data.type, function(key, value) {
                            if(value.id == data.service[0].idType) {
                                $('select[name="type"]').append('<option value='+ value.id +' selected>' + value.libelleTypeService + '</option>' );
                            }else{
                                $('select[name="type"]').append('<option value='+ value.id +'>' + value.libelleTypeService + '</option>' );
                            }
                        });
                        $('#action').html('Modifier');
                    }
                });
            }
        });
    });
</script>
@endsection