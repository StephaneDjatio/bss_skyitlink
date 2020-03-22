@extends('layouts.app')


@section('content')

<form class="login-form" method="post" action="{{route('login.authorize')}}">
    @csrf
    <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="text-center">
            @include('errors')
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <!--<button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
    </div>
</form>

@endsection
