@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Crear nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(["route" => "admin.levels.store"]) !!}

                <div class="form-group">
                    {!! Form::label("name", "Nombre") !!}
                    {!! Form::text("name", null, ["class" => "form-control", "placeholder" => "Ingrese el nombre del nivel"]) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit("Crear nivel", ["class" => "btn btn-primary"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
