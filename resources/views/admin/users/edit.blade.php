@extends('admin.app')
@section('content')
    <div class="app-title">
        <div>
           <h1><i class="fa fa-briefcase"></i> Usuarios</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Editar Usuarios</h3>
                <form action="{{ route('admin.users.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Nombre <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $users->name) }}"/ autofocus>
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>

                    </div>
                     <div class="form-group">
                            <label class="control-label" for="last_name">Apellido <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" autocomplete="off" type="text" name="last_name" id="last_name" value="{{ old('last_name', $users->last_name) }}"/>
                           @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" autocomplete="off" type="email" name="email" id="email" value="{{ old('email', $users->email) }}" disabled/>
                           @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Contraseña <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" autocomplete="off" type="password" name="password" id="password" value="{{ old('password') }}"/ required>
                           @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         {{-- <div class="form-group">
                            <label class="col-md-3" for="rol">Rol<span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="id_rol" id="id_rol">
                                <option value="0" disabled>Seleccione</option>
                                    @foreach($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->description}}</option>
                                    @endforeach
                                </select>
                                @error('id_rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                                                    
                            </div> --}}
                        </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
