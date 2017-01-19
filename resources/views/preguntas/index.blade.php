@extends('layouts.app')

@section('nav-pregunta', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
	        <div class="col-lg-12 margin-tb">
	            <div class="pull-left">
	                <h2 style="margin-top: 0;">Lista de Preguntas</h2>
	            </div>
	            <a class="btn btn-success pull-right" href="{{ route('preguntas.create') }}"> Nueva Pregunta</a>
	        </div>
    	</div>
		<div class="panel panel-default">
            <div class="panel-body">
                @if ($message = Session::get('success'))
			        <div class="alert alert-success">
			            <p>{{ $message }}</p>
			        </div>
			    @endif

			    <table class="table table-bordered">
			        <tr>
			            <th>ID</th>
			            <th>Nombre</th>
			            <th>Respuesta</th>
			            <th width="280px">Opciones</th>
			        </tr>
				    @foreach ($preguntas as $key => $pregunta)
				    <tr>
				        <td>{{ $pregunta->id }}</td>
				        <td>{{ $pregunta->pregunta }}</td>
				        <td style="background-color: {{ $pregunta->respuesta }}; color:white;">{{ $pregunta->respuesta }}</td>
				        <td>
				            <a class="btn btn-info" href="{{ route('preguntas.show',$pregunta->id) }}">Ver</a>
				            <a class="btn btn-primary" href="{{ route('preguntas.edit',$pregunta->id) }}">Editar</a>
				            {!! Form::open(['method' => 'DELETE','route' => ['preguntas.destroy', $pregunta->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
				            {!! Form::close() !!}
				        </td>
				    </tr>
				    @endforeach
			    </table>
            </div>
		</div>
	</div>
</div>
@endsection