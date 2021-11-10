@extends('admin.app')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i> Clientes</h1>
            <p>Lista de Clientes</p>
        </div>
         <a href="{{url('listarClientesPdf')}}" target="_blank">
             <button type="button" class="btn btn-success">
                <i class="fa fa-file"></i>&nbsp;&nbsp;Reporte PDF    
             </button>
        </a>
       {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">Agregar</a>  --}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Ciudad </th>
                            <th> Dirección </th>
                            <th> Teléfono </th>
                            <th> Email </th>
                            {{-- <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th> --}}
                        </tr>
                        </thead>
                        <tbody>
                          @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td> 
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido }}</td>
                                    <td>{{ $cliente->ciudad }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    {{-- <td><span class="badge badge-info">{{ $rol->status }}</span></td> --}}
                                    
                                   
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
