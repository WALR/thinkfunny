@extends('layouts.app')

@section('nav-color', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
	        <div class="col-lg-12 margin-tb">
	            <div class="pull-left">
	                <h2 style="margin-top: 0;">Lista de Colores</h2>
	            </div>
	            <a class="btn btn-success pull-right" href="{{ route('colores.create') }}"> Nuevo Color</a>
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
			            <th>Color</th>
			            <th width="280px">Opciones</th>
			        </tr>
				    @foreach ($colores as $key => $color)
				    <tr>
				        <td>{{ $color->id }}</td>
				        <td>{{ $color->nombre }}</td>
				        <td style="background-color: {{ $color->color }}; color:white;">{{ $color->color }}</td>
				        <td>
				            <a class="btn btn-info" href="{{ route('colores.show',$color->id) }}">Ver</a>
				            <a class="btn btn-primary" href="{{ route('colores.edit',$color->id) }}">Editar</a>
				            {!! Form::open(['method' => 'DELETE','route' => ['colores.destroy', $color->id],'style'=>'display:inline']) !!}
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