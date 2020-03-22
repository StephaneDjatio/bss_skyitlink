@extends('layouts.main')


@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Main Menu</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Home</li>
            <li><i class="fa fa-laptop"></i>Main Menu</li>
        </ol>
    </div>
</div>

<div class="row">
    @foreach($modules as $module)
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="{{route('menu', $module->id)}}">
            <div class="info-box {{$module->couleur}}">
                <i class="{{$module->icon}}">
                    <!--<img src="{{asset('assets/img/client.png')}}" alt="">-->
                </i>
                <div class="title">{{$module->module}}</div>
            </div>
        </a>
        <!--/.info-box-->
    </div>
    <!--/.col-->
    @endforeach

</div>
<!--/.row-->
@endsection