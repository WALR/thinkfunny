@extends('layouts.app')

@section('nav-pregunta', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear Pregunta</h2>
            </div>
        </div>
    	</div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ohhh!</strong> tenemos un error en los siguientes datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
		<div class="panel panel-default">
		<div class="panel-body">
		    {!! Form::open(array('route' => 'preguntas.store','method'=>'POST')) !!}
				{{ csrf_field() }}
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Pregunta:</strong>
		                {!! Form::text('pregunta', null, array('placeholder' => 'Pregunta','class' => 'form-control')) !!}
		            </div>
		        </div>

		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Respuesta:</strong>
		                {!! Form::text('respuesta', null, array('placeholder' => 'Respuesta','class' => 'form-control')) !!}

		            </div>
		        </div>

				<div class="col-xs-6">
					<a class="btn btn-block btn-default" href="{{ route('preguntas.index') }}"> Atras</a>
				</div>
				<div class="col-xs-6">			
		            <button type="submit" class="btn btn-block btn-primary">Guardar</button>
				</div>

		    {!! Form::close() !!}
		</div>
		</div>
	</div>
</div>
@endsection