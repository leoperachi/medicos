@extends('layouts.login')

@section('content')
<div class="">
    <div class="row justify-content-end">
        <div class="col-md-3 card-login">
            <div class="card cardLeo" style="">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <img src="img/logo_cliente.png" alt="">
                        </div>
                        <div class="form-group form-group-input row">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" 
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-input row">
                            <div class="col-md-12">
                                <input id="password" type="password"  placeholder="Password" 
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-button row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary" id="btnLogin">
                                        {{ __('Login') }}
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loading" class="loading" style="z-index: 9999;" >Loading&#8230;</div>
@yield('scripts')
<script>
 $(document).ready(function(){
     $("#btnLogin").click(function(){
        $("#loading").show();    
     });
    setTimeout(() => {
        $("#loading").hide();    
    }, 500);
 });
</script>
@endsection
