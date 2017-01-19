<?php

namespace thinkfunny\Http\Controllers;

use Illuminate\Http\Request;
use thinkfunny\Pregunta;


class PreguntaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index',compact('preguntas'));
    }

    public function create()
    {
        return view('preguntas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pregunta' => 'required',
            'respuesta' => 'required',
        ]);

        Pregunta::create($request->all());
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta creada!');
    }

    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        return view('preguntas.show',compact('pregunta'));
    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        return view('preguntas.edit',compact('pregunta'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pregunta' => 'required',
            'respuesta' => 'required',
        ]);

        Pregunta::find($id)->update($request->all());
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta Editada!');
    }

    public function destroy($id)
    {
        Pregunta::find($id)->delete();
        return redirect()->route('preguntas.index')
                        ->with('success','Pregunta Eliminada!');
    }

}
