@extends('site.app')
@section('title', 'Order Completed')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Orden Completa</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
                    <p class="alert alert-success">Tu orden se ha completado. Tu codigo es : {{ $order->order_number }}.</p></main>
            </div>
        </div>
    </section>
@stop
