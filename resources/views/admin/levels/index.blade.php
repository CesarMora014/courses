@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Lista de niveles</h1>
@stop

@section('content')
    @if (session("info"))
        <div class="alert alert-success">
            {{session("info")}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.levels.create')}}" class="btn btn-primary text-white">Nuevo nivel</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.levels.edit',$level)}}" class="btn btn-warning text-white btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy',$level)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm text-white">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop