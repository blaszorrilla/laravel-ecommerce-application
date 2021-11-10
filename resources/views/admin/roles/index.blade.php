@extends('admin.app')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i> Roles</h1>
            <p>Lista de Roles</p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">Agregar</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Descripcion </th>
                            <th> Estado </th>
                            <th> Editar </th>
                            <th> Cambiar Estado </th>
                            {{-- <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th> --}}
                        </tr>
                        </thead>
                        <tbody>
                          @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->description }}</td>
                                    {{-- <td><span class="badge badge-info">{{ $rol->status }}</span></td> --}}
                                    <td>  
                                       @if($rol->status=="ACTIVO")
                                        <button type="button" class="btn btn-success btn-md">
                                          <i class="fa fa-check fa-2x"></i>Activo
                                        </button>
                                    @else
                                         <button type="button" class="btn btn-danger btn-md">
                                          <i class="fa fa-check fa-2x"></i>Inactivo
                                        </button>
                                    @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.roles.edit', $rol->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                             <td>  
                                            @if($rol->status=="ACTIVO")

                                                <button type="button" class="btn btn-danger btn-sm" data-id="{{$rol->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                                    <i class="fa fa-times fa-2x"></i> Desactivar
                                                </button>

                                                @else

                                                <button type="button" class="btn btn-success btn-sm" data-id="{{$rol->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                                    <i class="fa fa-lock fa-2x"></i> Activar
                                                </button>

                                                @endif
                                            </td>  
                                           {{--  <a href="" data-id="{{$rol->id}}" data-toggle="modal" data-target="#cambiarEstado" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                                        
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--Inicio del modal CAMBIAR ESTADO-->
             <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar Estado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('roles.destroy','test')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                  {{method_field('delete')}}
                                {{csrf_field()}} <!-- evitar ataques -->
                                <input type="hidden" id="id" name="id" value="">
                                 <p>¿Estas seguro de cambiar el estado?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    
                </div> 
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal CAMBIAR ESTADO-->

    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
    /*INICIO ventana modal para cambiar estado de Categoria*/
    
    $('#cambiarEstado').on('show.bs.modal', function (event) {
    
    //console.log('modal abierto');
    
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    
    modal.find('.modal-body #id').val(id);
    })
    $('.modal').on('hidden.bs.modal', function(){ 
        $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
        
    });
     
    /*FIN ventana modal para cambiar estado de la categoria*/
    </script>
@endpush
