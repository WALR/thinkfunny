<?php

namespace thinkfunny\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use thinkfunny\Pregunta;
use thinkfunny\Colores;
use thinkfunny\Transformer\PreguntaTransformer;
use thinkfunny\Transformer\ColoresTransformer;

class AjaxController extends Controller
{
    
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function preguntas()
    {
        $preguntas = Pregunta::all();
        return $this->response->withCollection($preguntas, new PreguntaTransformer());        
    }

    public function colores()
    {
        $colores = Colores::all();
        return $this->response->withCollection($colores, new ColoresTransformer());        
    }
}