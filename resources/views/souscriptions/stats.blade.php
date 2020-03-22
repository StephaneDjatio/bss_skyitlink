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
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Graphe
            </header>
            <div class="panel-body text-center">
                <canvas id="line" height="500" width="1000"></canvas>
            </div>
        </section>
    </div>
    <!-- Bar -->
</div>
<div>

</div>

@endsection

@section('scripts')
<!-- chartjs -->
<script src="{{asset('assets/assets/chart-master/Chart.js')}}"></script>
<!-- custom chart script for this page only-->
<script src="{{asset('assets/js/chartjs-custom.js')}}"></script>
@endsection
