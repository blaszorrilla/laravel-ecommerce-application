@extends('admin.app')
@section('content')
    <div class="app-title">
        <div>
           <h1><i class="fa fa-briefcase"></i> Roles</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Editar Rol</h3>
                <form action="{{ route('admin.roles.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    {{--  <input type="hidden" id="id" name="id" value=""> --}}
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="description">Descripción <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" autocomplete="off" type="text" name="description" id="description" value="{{$roles->description }}"/>
                            <input type="hidden" name="id" value="{{ $roles->id }}">
                           @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        {{-- <div class="form-group">
                        <label class="control-label" for="status">Estado</label>
                             <select name="status" id="status" class="form-control" multiple>
                                     @foreach($roles as $rol)
                                          @php $check = in_array($rol->id, $rol->status->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                           <option value="{{ $rol->id }}" {{ $check }}>{{ $rol->status }}</option>
                                     @endforeach
                             </select>
                        <div> --}}
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
