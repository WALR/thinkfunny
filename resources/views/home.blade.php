@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Colores</div>
                <div class="panel-body" id="panel-body">
                    <div id="panel_iniciar" class="col-xs-12">
                        <div class="text-center">
                            <a href="#" id="btn_init" class="btn btn-primary btn-large" >Inicar Juego</a>
                        </div>
                    </div>
                    <div id="init_juego" hidden>
                        <div class="col-xs-12 text-center">
                            Selecciona el color:
                            <p id="pregunta_color" style="font-size: 33px; font-weight: 700;">
                                ROJO
                            </p>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a href="#" class="btn" style="padding: 4em; background-color: red;"></a>
                            <a href="#" class="btn" style="padding: 4em; background-color: blue;"></a>
                            <a href="#" class="btn" style="padding: 4em; background-color: green;"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
