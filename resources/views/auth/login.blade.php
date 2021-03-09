@extends('layouts.init')
@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="conatiner">
    <div class="form">
        <div class="contact-info">
                <h3 class="contact_tittle">BIENVENIDO USUARIO</h3>
                <p class="contact_text">Si tienes un problema al iniciar sesión has olvidado tu contraseña por favor comunícate con los administradores.
                </p>

            <div class="contactos_info">
                <div class="contact_information">
                    <i class="fas fa-2x fa-user"></i>
                    <p>jldm605@gmail.com</p>
                </div>
                <div class="contact_information">
                    <i class="fas fa-2x fa-user"></i>
                    <p>999999999</p>
                </div>
                <div class="contact_information">
                    <i class="fas fa-2x fa-user"></i>
                    <p>9990-89095</p>
                </div>
            </div>
            <div class="social_media">
                <p>Atte:</p>
                <div class="social-icons">
                        <img src="{{asset('img/favicon_higienika_office_peru.png')}}" alt="">
                        <p>Higienika Oficce Perú</p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
                <h3 class="contact_tittle">INGRESA TUS DATOS</h3>
                <div class="input-container">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong><h6 style="color:yellow;">{{ __('Por favor digite bien su usuario o contraseña') }}</h6></strong>
                            </span>
                        @enderror
                </div>
                <div class="input-container">
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required  placeholder="CONTRASEÑA" autocomplete="current-password"
                    minlength="5" maxlength="40" pattern="[A-Za-z0-9]+">
                </div>
                <input type="submit" value="LogIn" class="contact_btn">
                    <div class="form-group row mb-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection 
