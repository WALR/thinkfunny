<?php

namespace thinkfunny\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;

use thinkfunny\Colores;
use thinkfunny\Transformer\ColoresTransformer;


class ColoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $colores = Colores::all();
        return view('colores.index',compact('colores'));
    }

    public function create()
    {
        return view('colores.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'color' => 'required',
        ]);

        Colores::create($request->all());
        return redirect()->route('colores.index')
                        ->with('success','Color creado!');
    }

    public function show($id)
    {
        $color = Colores::find($id);
        return view('colores.show',compact('color'));
    }

    public function edit($id)
    {
        $color = Colores::find($id);
        return view('colores.edit',compact('color'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'color' => 'required',
        ]);

        Colores::find($id)->update($request->all());
        return redirect()->route('colores.index')
                        ->with('success','Color Editado!');
    }

    public function destroy($id)
    {
        Colores::find($id)->delete();
        return redirect()->route('colores.index')
                        ->with('success','Color Eliminado!');
    }


}
