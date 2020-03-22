@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Statistiques des installations</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Statistiques des Installations</li>
        </ol>
    </div>
</div>
<div class="row">
    <!-- Line -->
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">
                Graphe
            </header>
            <div class="panel-body text-center">
                <canvas id="bar" height="300" width="700"></canvas>
            </div>
        </section>
    </div>
    <!-- Bar -->
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                Statistiques
            </header>
            <div class="panel-body" style="height:335px; padding: 60px 0 0 40px;">
                <div class="row">
                    <h3><b class="label label-success">terminée</b> : <b>{{count($termine)}} sites</b></h3>
                    <h4 class="text-primary"></h4>
                </div>
                <div class="row">
                    <h3><b class="label label-warning">En cours</b> : <b>{{count($encours)}} sites</b> </h3>
                    <h4 class="text-warning"></h4>
                </div>
                <div class="row">
                    <h3><b class="label label-danger">En attente</b> : <b>{{count($nonprogramme)}} sites</b></h3>
                    <h4 class="text-danger"></h4>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('scripts')
<!-- chartjs -->
<script src="{{asset('assets/assets/chart-master/Chart.js')}}"></script>
<!-- custom chart script for this page only-->
<script src="{{asset('assets/js/chartjs-custom.js')}}"></script>
@endsection
