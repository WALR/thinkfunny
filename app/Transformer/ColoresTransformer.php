<?php
 
namespace thinkfunny\Transformer;
 
class ColoresTransformer {
 
    public function transform($color) {
        return [
            'id' => $color->id,
            'nombre' => $color->nombre,
            'color' => $color->color
        ];
    }
 
}
