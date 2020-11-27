@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Comité elección
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('eleccioncomite.update') }} " enctype="multipart/form-data">
             @method('PUT')
            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="eleccion">Eleccion:</label>
                <select name="eleccion_id">
                @foreach ($elecciones as $eleccion)
                <option value="{{$eleccion->id}}"> {{ $eleccion->periodo}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                @csrf
                <label for="funcionario">Funcionario:</label>
                <select name="funcionario_id">
                @foreach ($funcionarios as $funcionario)
                <option value="{{$funcionario->id}}"> {{ $funcionario->nombrecompleto}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                @csrf
                <label for="rol">Rol:</label>
                <select name="rol_id">
                @foreach ($roles as $rol)
                <option value="{{$rol->id}}"> {{ $rol->descripcion}}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection