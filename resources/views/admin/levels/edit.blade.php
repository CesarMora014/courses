@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar nivel</h1>
@stop

@section('content')
    @if (session("info"))
        <div class="alert alert-success">
            {{session("info")}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($level,["route" => ["admin.levels.update", $level], "method" => "PUT" ]) !!}

                <div class="form-group">
                    {!! Form::label("name", "Nombre") !!}
                    {!! Form::text("name", null, ["class" => "form-control", "placeholder" => "Ingrese el nombre del nivel"]) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit("Actualizar nivel", ["class" => "btn btn-primary"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
