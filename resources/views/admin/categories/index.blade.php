@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Lista de categorías</h1>
@stop

@section('content')
    @if (session("info"))
        <div class="alert alert-success">
            {{session("info")}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary text-white">Nueva categoría</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px"><a href="{{route('admin.categories.edit',$category)}}" class="btn btn-warning btn-sm text-white">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                    @method("DELETE")
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