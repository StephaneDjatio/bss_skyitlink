@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Clients</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Modifier les parametres du client</li>
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
            Modifier les parametres du client
            </header>
            <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="employe_form" method="post" action="{{route('clients.update',$client)}}">
                    @csrf
                    <div class="form-group">
                        <label for="typeclient" class="control-label col-lg-3">Type de client <span class="required">*</span></label>
                        <div class="col-lg-9">
                            <select id="typeclient" class="form-control" name="typeclient">
                                <option value="">Choisir le type de client</option>
                                @if($client->typeCli == 1)
                                    <option value="1" selected>Entreprise</option>
                                    <option value="2">Partenaire</option>
                                    <option value="3">Domicile</option>
                                @elseif($client->typeCli == 2)
                                    <option value="1">Entreprise</option>
                                    <option value="2" selected>Partenaire</option>
                                    <option value="3">Domicile</option>
                                @elseif($client->typeCli == 3)
                                    <option value="1">Entreprise</option>
                                    <option value="2">Partenaire</option>
                                    <option value="3" selected>Domicile</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fname" class="control-label col-lg-3">Nom <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="fname" name="fname" type="text" value="{{$client->nomCli}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="lname" class="control-label col-lg-3">Prénom <span class="required"></span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="lname" name="lname" type="text" value="{{$client->prenomCli}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="address" class="control-label col-lg-3">Adresse <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="address" name="address" type="text" value="{{$client->adresseCli}}"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="phno" class="control-label col-lg-3">Numéro Téléphone 1 <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="phno" name="phno" type="text" value="{{$client->telCli}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="phno_2" class="control-label col-lg-3">Numéro Téléphone 2 <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="phno_2" name="phno_2" type="text" value="{{$client->telCli2}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="mail_address" class="control-label col-lg-3">Mail <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="mail_address" name="mail_address" type="text" value="{{$client->mailCli}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-3">Mail <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <input class=" form-control" id="username" name="username" type="text" value="{{$client->nomUtilisateur}}" />
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
