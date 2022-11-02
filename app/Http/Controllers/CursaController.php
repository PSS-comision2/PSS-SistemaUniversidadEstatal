<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursa;
use App\Models\Alumno;
use App\Models\Dicta;
use App\Models\Materia;
use App\Models\Rinde;
use Auth;

class CursaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $LU = Auth::user()->LU;
        $materias_inscripto = Cursa::all()->where('LU_alumno', $LU)->where('nota', null)->pluck('id_materia')->toArray();
        $materias_alumno = Cursa::all()->where('LU_alumno', $LU)->where('nota','Aprobado')->pluck('id_materia')->toArray();
        $materias_sin_nota = Cursa::all()->where('LU_alumno', $LU)->whereNull('nota')->pluck('id_materia')->toArray();
        $materias_puede_anotarse = Materia::whereNotIn('id', $materias_alumno)->whereNotIn('id', $materias_sin_nota)->get();
        return view('alumno.inscribircursada')->with('materias_puede_anotarse', $materias_puede_anotarse)->with('materias_inscripto',$materias_inscripto);
    }

    public function guardar_alumno_materia(Request $request){
        $cursa = new Cursa();

        $cursa->LU_alumno = Auth::user()->LU;
        $cursa->id_materia = $request->get('materia');

        $cursa->save();

        return redirect('/alumno')->with('estado','La inscripción se realizó correctamente.');
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
    public function show()
    {
        $LU = Auth::user()->LU;
        $cursa = Cursa::all()->where('LU_alumno', $LU);
        $rinde = Rinde::all()->where('LU_alumno', $LU);
        $materia = Materia::all();
        return view ('alumno.historiaacademica')->with('cursa', $cursa)->with('rinde', $rinde)->with('materia', $materia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function mostrar_cuatrimestre_alumno(){
        $LU = Auth::user()->LU;

        $cursadas = Cursa::all()->where('LU_alumno',$LU)->whereNull('nota')->pluck('id_materia')->toArray();
        $materias = Dicta::all()->whereIn('id_materia',$cursadas);

        return view('alumno.mostrarmateriasinscriptas')->with('cursadas', $materias);
    }
}
