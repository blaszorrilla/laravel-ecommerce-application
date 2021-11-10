@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{url('listarCategoriaPdf')}}" target="_blank">
             <button type="button" class="btn btn-success">
                <i class="fa fa-file"></i>&nbsp;&nbsp;Reporte PDF    
             </button>
        </a>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right">Agregar</a>
        
    </div>
    
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nombre </th>
                               {{--  <th> url </th> --}}
                                <th class="text-center"> Descripcion </th>
                                <th class="text-center"> Destacada </th>
                                <th class="text-center"> Menu </th>
                               {{--  <th class="text-center"> Orden </th> --}}
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                @if ($category->id != 1)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                       
                                       {{--  <td>{{ $category->slug }}</td> --}}
                                         <td>{{ $category->description }}</td>
                                         <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            @if ($category->featured == 1)
                                                <span class="badge badge-success">Si</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($category->menu == 1)
                                                <span class="badge badge-success">Si</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                            {{ $category->order }}
                                        </td> --}}
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
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
