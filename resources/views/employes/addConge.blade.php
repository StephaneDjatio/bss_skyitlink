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
            <header class="panel-heading" id="title">
            Enregistrer un congé
            </header>
            <div class="panel-body">
            <div class="form">
                @if(!isset($conge))
                <form class="form-validate form-horizontal " id="conge_form" method="post" action="{{route('conges.store',$menu_id)}}">
                @else
                <form class="form-validate form-horizontal " id="conge_form" method="post" action="{{route('conges.update',$conge)}}">
                @endif 
                    @csrf
                    <div class="form-group ">
                        <label for="employe" class="control-label col-lg-3">Employé <span class="required">*</span></label>
                        <div class="col-lg-9">
                        <select class="form-control" name="employe" id="employe">
                            <option value="">Choisir Employé</option>
                            @foreach($employes as $employe)
                                @if(isset($conge))
                                    @if($conge->idEmp == $employe->id)
                                        <option value="{{$employe->id}}" selected>{{$employe->nomEmp}} {{$employe->prenomEmp}}</option>
                                    @else
                                        <option value="{{$employe->id}}">{{$employe->nomEmp}} {{$employe->prenomEmp}}</option>
                                    @endif
                                @else
                                    <option value="{{$employe->id}}">{{$employe->nomEmp}} {{$employe->prenomEmp}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="motifs" class="control-label col-lg-3">Motifs de Congés <span class="required">*</span></label>
                        <div class="col-lg-9">
                        @if(isset($conge))
                            <input class=" form-control" id="motifs" name="motifs" type="text" value="{{$conge->libelleConge}}"/>
                        @else
                            <input class=" form-control" id="motifs" name="motifs" type="text" />
                        @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="dateDeb" class="control-label col-lg-3">Date de debut <span class="required">*</span></label>
                        <div class="col-lg-9">
                        @if(isset($conge))
                            <input class=" form-control" id="dateDeb" name="dateDeb" type="date" value="{{$conge->dateDeb}}"/>
                        @else
                            <input class=" form-control" id="dateDeb" name="dateDeb" type="date" />
                        @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="dateFin" class="control-label col-lg-3">Date de Fin <span class="required">*</span></label>
                        <div class="col-lg-9">
                        @if(isset($conge))
                            <input class=" form-control" id="dateFin" name="dateFin" type="date" value="{{$conge->dateFin}}"/>
                        @else
                            <input class=" form-control" id="dateFin" name="dateFin" type="date" />
                        @endif
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