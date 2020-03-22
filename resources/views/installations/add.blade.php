@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Planification des installations</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Planification</li>
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
            Planification
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="planification_form" method="post" action="{{route('planifications.store',$menu_id)}}">
                    @csrf
                    <div class="form-group ">
                        <label for="clients" class="control-label col-lg-3">Clients <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="clients" id="clients">
                            <option value="">Choisir client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->nomCli}} {{$client->prenomCli}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="sites" class="control-label col-lg-3">Sites <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="sites" id="sites">
                            <option value="">Choisir site</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="datePlan" class="control-label col-lg-3">Date de planification <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="datePlan" name="datePlan" type="date" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="equipe" class="control-label col-lg-3">Libelle Equipe <span class="required"></span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="equipe" name="equipe" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="techniciens" class="control-label col-lg-3">Techniciens <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select multiple class="form-control" name="techniciens[]" id="techniciens">
                            @foreach($techniciens as $technicien)
                                <option value="{{$technicien->affect}}">{{$technicien->nomEmp}} {{$technicien->prenomEmp}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" id="action">Enregistrer</button>
                        <button class="btn btn-danger" type="reset">Annuler</button>
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

        $('#clients').on('change', function() {
            var client_id = this.value;
            var select ='<option value="">Choisir site</option>';
            if(client_id) {
                console.log(client_id);
                $.ajax({
                    url: '/sites',
                    type: 'GET',
                    data:{client_id:client_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(index, value) {
                            console.log(value);
                            select += "<option value="+value.id+">"+value.site+"</option>";
                        });

                        $('#sites').html(select);
                    }
                });
            }else{
                $('#sites').html(select);
            }
        });
    });
</script>
@endsection
