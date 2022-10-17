<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dicta;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\Rinde;
use App\Models\Cursa;
use Illuminate\Support\Facades\Log;
use Auth;

class CursadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legajo_profesor = Auth::user()->legajo;
        $materias_dicta = Dicta::get()->where('legajo', $legajo_profesor);
        return view('profesor.cursados')->with('materias',$materias_dicta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        $alumnos_cursan = Cursa::all()->where('id_materia',$id);

        return view('profesor.notascursados')->with('materia',$materia)->with('alumnos_cursan',$alumnos_cursan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estados = $request->input('estados');
        $LUs = $request->input('LUs');
        $indice = 0;

        foreach((array) $LUs as $LU){
            $alumno_cursa = Cursa::all()->where('id_materia',$id)->where('LU_alumno',$LU)->first();
            if($estados[$indice] === 'sindefinir')
                $alumno_cursa->nota = null;
            else
                $alumno_cursa->nota = $estados[$indice];
            $indice++;
            $alumno_cursa->save();
        }

        return redirect('/profesor')->with('estado','Se cargaron las notas correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
