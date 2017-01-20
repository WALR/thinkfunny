@extends('layouts.app')

@section('title', 'Juego')

@section('nav-game', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Colores</div>
                <div class="panel-body" id="panel-body">
                    <div id="panel_iniciar" class="col-xs-12">
                        <div class="text-center">
                            <button id="btn_init" onClick="initgame(this)" class="btn btn-primary btn-large" >Inicar Juego</button>
                        </div>
                    </div>
                    <div id="init_juego" hidden>
                        <div class="col-xs-12 text-center">
                            Selecciona el color:
                            <p id="pregunta_color" style="font-size: 33px; font-weight: 700;">
                                ROJO
                            </p>
                        </div>
                        <div class="col-xs-12 text-center" id="respuesta_color">
                        </div>
                    </div>
                    <div id="panel_califica" class="col-xs-12" hidden>
                        <div class="text-center">
                            <p id="califaca">
                            </p>
                            <button id="btn_init" onClick="initgame(this)" class="btn btn-primary btn-large" >Nuevo Juego</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="data">
    
</div>
@endsection
