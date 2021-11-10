@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Fecha: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Recibido por
                            {{-- <address><strong>{{ $order->user->nombre }}</strong><br>Email: {{ $order->user->email }}</address> --}}
                            <address><strong>{{ $order->user->fullName }}</strong><br>Email: {{ $order->user->email }}</address> 
                        </div>
                        <div class="col-4">Enviar a
                            <address><strong>Nombre: </strong> {{ $order->nombre }} {{ $order->apellido }}<br><strong>Ciudad: </strong> {{ $order->ciudad }} <br><strong>Dirección: </strong> {{ $order->ciudad }} <br><strong>Telefono: </strong> {{ $order->telefono }}<br></address>
                            
                        </div>
                        <div class="col-4">
                            <b>Order ID:</b> {{ $order->order_number }}<br>
                            <b>Monto:</b> {{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}<br>
                            <b>Método de pago:</b>PayPal<br>
                           {{--  <b>Payment Method:</b> {{ $order->payment_method }}<br> --}}
                            <b>Estado del pago:</b> {{ $order->payment_status == 1 ? 'Completo' : 'Incompleto' }}<br>
                            <b>Estado de la orden:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Codigo</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->sku }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ config('settings.currency_symbol') }}{{ round($item->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
