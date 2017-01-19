@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <img src="/uploads/avatars/{{ $user->avatar }}"" class="img-circle" width="150" height="150">
                        </div>
                        <div class="row">
                            <form action="{{ url('/perfil') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="InputAvatar">Nueva Imagen</label>
                                    <input class="form-control" type="file" name="avatar" />
                                </div>
                                <input type="submit" class="btn btn-primary" value="Enviar">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p>Nombre: {{ $user->name }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection