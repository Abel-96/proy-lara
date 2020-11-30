@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Agregar Votocandidato
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
		<form method="post" action="{{ route('votocandidato.store') }} " enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
                @csrf
                <label for="voto_id">voto_id:</label>
                <select name="voto_id">
                @foreach ($votos as $voto)
                <option value="{{$voto->id}}"> {{ $voto->id}}</option>
                @endforeach
                </select>
			</div>
			<div class="form-group">
                @csrf
                <label for="candidato_id">candidato_id:</label>
                <select name="candidato_id">
                @foreach ($candidatos as $candidato)
                <option value="{{$candidato->id}}"> {{ $candidato->id}}</option>
                @endforeach
                </select>
            </div>
			<div class="form-group">
				@csrf
				<label for="sexo">votos:</label>
				<input type="text" class="form-control" name="votos" maxlength="200" />
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
</div>
@endsection