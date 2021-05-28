@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Cursos pendientes de aprobación</h1>
@stop

@section('content')

    @if (session("info"))
        <div class="alert alert-success" x-data="{open:true}" x-show="open">
            {{session("info")}}.
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>@if($course->category){{$course->category->name}} @else Sin Categoría @endif</td>
                            <td><a href="{{ route('admin.courses.show',$course)}}" class="btn btn-primary">Ver</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$courses->links("vendor.pagination.bootstrap-4")}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop