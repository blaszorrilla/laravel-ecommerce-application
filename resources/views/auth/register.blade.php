@extends('site.app')
@section('title', 'Register')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Registro</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Registro</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('register') }}" method="POST" role="form">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" autocomplete="off" name="nombre" id="nombre" value="{{ old('nombre') }}">
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" autocomplete="off" name="apellido" id="apellido" value="{{ old('apellido') }}">
                                    @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="off" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Repetir Contraseña</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control  @error('ciudad') is-invalid @enderror"  autocomplete="off" name="ciudad" id="ciudad" value="{{ old('ciudad') }}">   
                                     @error('ciudad')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror 
                            </div>
                             <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input class="form-control  @error('direccion') is-invalid @enderror" type="text"  autocomplete="off" name="direccion" id="direccion" value="{{ old('direccion') }}">
                                 @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input class="form-control  @error('telefono') is-invalid @enderror" type="text"  autocomplete="off" name="telefono" id="telefono" value="{{ old('telefono') }}">
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block"> Registrarse </button>
                            </div>
                            
                        </form>
                    </article>
                    <div class="border-top card-body text-center">¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></div>
                </div>
            </div>
        </div>
    </section>
@stop
