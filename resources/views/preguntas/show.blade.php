@extends('layouts.app')

@section('nav-pregunta', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Pregunta:</strong>
		                <p style="padding-left: 0.5em;">{{ $pregunta->pregunta }}</p>
		            </div>
		        </div>
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Respuesta:</strong>
		                <p style="padding-left: 0.5em;color:{{ $pregunta->respuesta }}">{{ $pregunta->respuesta }}</p>
		            </div>
		        </div>
				<div class="col-xs-12 col-md-4">
		        	<a class="btn btn-block btn-default" href="{{ route('preguntas.index') }}">atras</a>
				</div>
				<div class="col-xs-12 col-md-4">
	            	<a class="btn btn-block btn-primary" href="{{ route('preguntas.edit',$pregunta->id) }}">Editar</a>
					
				</div>
				<div class="col-xs-12 col-md-4">
		            {!! Form::open(['method' => 'DELETE','route' => ['preguntas.destroy', $pregunta->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Eliminar', ['class' => 'btn btn-block btn-danger']) !!}
		            {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection