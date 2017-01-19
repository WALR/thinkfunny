<?php

namespace thinkfunny;

use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
    protected $table = 'colores';
    protected $fillable = ['nombre', 'color'];
}
