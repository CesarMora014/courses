@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Lista de precios</h1>
@stop

@section('content')
    @if (session("info"))
        <div class="alert alert-success">
            {{session("info")}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.prices.create')}}" class="btn btn-primary text-white">Nuevo precio</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td>{{$price->value}}</td>
                            <td width="10px"><a href="{{route('admin.prices.edit',$price)}}" class="btn btn-warning btn-sm text-white">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy',$price)}}" method="POST">
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