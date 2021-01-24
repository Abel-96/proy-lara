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
			<td>Nombre del funcionario</td>
			<td>Sexo</td>
			<td colspan="2">Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($funcionarios as $funcionario)
			<tr>
				<td>{{$funcionario->id}}</td>
				<td>{{$funcionario->nombrecompleto}}</td>
				<td>{{$funcionario->sexo}}</td>
				<td><a href="{{ route('funcionario.edit', $funcionario->id)}}"
				class="btn btn-primary">Editar</a></td>
				<td>
				<form action="{{ route('funcionario.destroy', $funcionario->id)}}"
				method="post">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit"
				onclick="return confirm('Esta seguro de borrar {{$funcionario->nombrecompleto}}')" >Eliminar</button>
				</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div>
<p>
<a href="{{route('funcionarios.pdf') }}" class="btn btn-sm btn-primary">
            Descargar Funcionarios en PDF
 </a>
</p>
@endsection