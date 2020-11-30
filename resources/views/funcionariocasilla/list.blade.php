@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
}
</style>
<div class="uper">
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div><br />
	@endif
	<table class="table table-striped">
	<thead>
		<tr>
			<td>ID</td>
			<td>funcnionario_id</td>
			<td>casilla_id</td>
			<td>rol_id</td>
			<td>eleccion_id</td>
			<td colspan="2">Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($funcionariocasillas as $funcionariocasilla)
			<tr>
				<td>{{$funcionariocasilla->id}}</td>
				<td>{{$funcionariocasilla->funcionario_id}}</td>
				<td>{{$funcionariocasilla->casilla_id}}</td>
				<td>{{$funcionariocasilla->rol_id}}</td>
				<td>{{$funcionariocasilla->eleccion_id}}</td>
				<td><a href="{{ route('funcionariocasilla.edit', $funcionariocasilla->id)}}"
				class="btn btn-primary">Editar</a></td>
				<td>
				<form action="{{ route('funcionariocasilla.destroy', $funcionariocasilla->id)}}"
				method="post">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit"
				onclick="return confirm('Esta seguro de borrar')" >Eliminar</button>
				</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div>
@endsection