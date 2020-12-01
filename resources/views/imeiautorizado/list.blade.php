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
			<td>funcionario_id</td>
			<td>eleccion_id</td>
			<td>casilla_id</td>
			<td>imei</td>
			<td colspan="2">Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($imeiautorizados as $imeiautorizado)
			<tr>
				<td>{{$imeiautorizado->id}}</td>
				<td>{{$imeiautorizado->funcionario_id}}</td>
				<td>{{$imeiautorizado->eleccion_id}}</td>
				<td>{{$imeiautorizado->casilla_id}}</td>
				<td>{{$imeiautorizado->imei}}</td>
				<td><a href="{{ route('imeiautorizado.edit', $imeiautorizado->id)}}"
				class="btn btn-primary">Editar</a></td>
				<td>
				<form action="{{ route('imeiautorizado.destroy', $imeiautorizado->id)}}"
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