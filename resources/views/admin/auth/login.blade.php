<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <title>Login</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
      {{--   <h1>{{ config('app.name') }}</h1> --}}
        <h1>Bienvenido</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('admin.login.post') }}" method="POST" role="form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" autocomplete="off" id="email" name="email" placeholder="Email" autofocus value="{{ old('email') }}">
             @error('email')
                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                     </span>
             @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Contraseña</label>
                <input class="form-control  @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Contraseña">
             @error('password')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
             @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember"><span class="label-text">Mantener conectado</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
            </div>
        </form>
    </div>
</section>
<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
</body>
</html>
