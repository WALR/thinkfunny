<?php
 
namespace thinkfunny\Transformer;
 
class PreguntaTransformer {
 
    public function transform($pregunta) {
        return [
            'id' => $pregunta->id,
            'pregunta' => $pregunta->pregunta,
            'respuesta' => $pregunta->respuesta
        ];
    }
 
}
