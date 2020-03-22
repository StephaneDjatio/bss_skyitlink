@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des produits</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des produits</li>
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
            Gestion des produits
            </header>

            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_key"></i> #ID</th>
                    <th><!--<i class="icon_calendar"></i>--> Produit</th>
                    <th><!--<i class="icon_calendar"></i>--> Montant</th>
                    <th><!--<i class="icon_calendar"></i>--> Type</th>
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @forelse($produits as $produit)
                <tr>
                    <td>{{$produit->id}}</td>
                    <td>{{$produit->libelleProduit}}</td>
                    <td>{{$produit->montant}} FCFA</td>
                    <td>{{$produit->libelleTypeProduit}}</td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary edit" id="{{$produit->id}}" href="javascript:;"><i class="fa fa-edit"></i></a>
                        <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="3"><h4 class="text-center">Pas de Produit défini</h4></td>
                @endforelse
            </tbody>
            </table>
            <div class="pull-right">{{$produits->links()}}</div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading" id="title">
            Création d'un nouveau produit
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="produit_form" method="post" action="{{route('produits.store',$menu_id)}}">
                    @csrf
                    <input type="hidden" id="produit_id" name="produit_id">
                    <div class="form-group ">
                        <label for="type" class="control-label col-lg-3">Type Produit <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select name="type" id="type" class="form-control">
                            <option value="">Choisir le type de produit</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->libelleTypeProduit}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="produit" class="control-label col-lg-3">Libellé Produit <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="produit" name="produit" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="montant" class="control-label col-lg-3">Montant <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="montant" name="montant" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="stock" class="control-label col-lg-3">Stock <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="stock" name="stock" type="text" />
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
            var produit_id = $(this).attr('id');
            if(produit_id) {
                console.log(produit_id);
                $.ajax({
                    url: '/produit',
                    type: 'GET',
                    data:{produit_id:produit_id},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.produit[0].libelleProduit);
                        $('#title').html('Modifier Produit');
                        $('#produit_id').val(data.produit[0].id);
                        $('#produit').val(data.produit[0].libelleProduit);
                        $('#montant').val(data.produit[0].montant);
                        $('#stock').val(data.produit[0].stock);
                        $('select[name="type"]').empty();
                        $.each(data.type, function(key, value) {
                            if(value.id == data.produit[0].idType) {
                                $('select[name="type"]').append('<option value='+ value.id +' selected>' + value.libelleTypeProduit + '</option>' );
                            }else{
                                $('select[name="type"]').append('<option value='+ value.id +'>' + value.libelleTypeProduit + '</option>' );
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