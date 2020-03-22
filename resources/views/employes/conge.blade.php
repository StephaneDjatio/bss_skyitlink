@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des congés</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des congés</li>
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
            Gestion des congés
            <a class="btn btn-primary pull-right" href="{{route('conges.create', $menu_id)}}"><i class="fa fa-edit"></i>Ajouter Congé</a>
            </header>
            <table class="table table-striped table-advance table-hover table-bordered">
                <thead>
                    <tr>
                        <th><i class="icon_key"></i> #Matricule</th>
                        <th>Nom & Prénom</th>
                        <th>Numéro de CNI</th>
                        <th>Motif de congé</th>
                        <th><i class="icon_calendar"></i> Date de Début</th>
                        <th><i class="fa fa-money"></i> Date de Fin</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-center">
                    @forelse($conges as $conge)
                        <tr>
                            <td>{{$conge->matriEmp}}</td>
                            <td>{{$conge->nomEmp}} {{$conge->prenomEmp}}</td>
                            <td>{{$conge->numCNI}}</td>
                            <td><b class="badge">{{$conge->libelleConge}}</b></td>
                            <td>{{$conge->dateDeb}}</td>
                            <td><b class="">{{$conge->dateFin}}</b></td>
                            <td>
                                <div class="btn-group">
                                <a class="btn btn-primary edit" id="{{$conge->id}}" href="{{route('conges.edit', $conge)}}"><i class="fa fa-edit"></i></a>
                                <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                                <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8"><h4 class="text-center">Aucun Congé enrégistré</h4></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </div>
</div>
<!-- page end-->
@endsection