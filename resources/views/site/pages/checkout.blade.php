@extends('site.app')
@section('title', 'Checkout')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Detalles de Pago</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                
                                    <div class="col form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="{{ auth()->user()->nombre }}" autofocus>
                                    </div>
                                    <div class="col form-group">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" name="apellido" value="{{ auth()->user()->apellido }}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" name="ciudad" value="{{ auth()->user()->ciudad }}" >
                                </div>
                                <div class="form-group">
                                   
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" name="direccion" value="{{ auth()->user()->direccion }}" >
                                
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="telefono" value="{{ auth()->user()->telefono }}" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                    <small class="form-text text-muted">No compartiremos tu email con nadie más.</small>
                                </div>
                                <div class="form-group">
                                    <label>Notas</label>
                                    <textarea class="form-control"  id="notas" name="notas" rows="6"></textarea>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Tu orden</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Realizar pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop
