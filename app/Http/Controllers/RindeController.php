<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rinde;
use App\Models\ExamenFinal;
use App\Models\Alumno;
use App\Models\Materia;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RindeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $LU = Auth::user()->LU;
        $finales_alumno = Rinde::all()->where('LU_alumno', $LU)->where('nota','>=','4')->pluck('id_final')->toArray();
        $finales_alumno_sin_nota = Rinde::all()->where('LU_alumno', $LU)->whereNull('nota')->pluck('id_final')->toArray();
        $finales_alumno_puede = ExamenFinal::whereNotIn('id', $finales_alumno)->whereNotIn('id',$finales_alumno_sin_nota)->get();
        $finales_puede_rendir = $finales_alumno_puede->where('estado', 'Abierto');
        $finales = array();

        foreach($finales_puede_rendir as $final_puede_rendir){
            array_push($finales, $final_puede_rendir);
        }

        return view('alumno.inscribirfinal')->with('finales', $finales);
    }

    public function guardar_alumno_final(Request $request){

        $rinde = new Rinde();

        $rinde->LU_alumno = Auth::user()->LU;
        $rinde->id_final = $request->get('examenfinal');
        $rinde->save();

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
    /*
    public function show()
    {
        $rinde = Rinde::all();
        $materia = Materia::all();
        return view ('alumno.historiaacademica')->with('rinde', $rinde)->with('materia', $materia);;
    }
    */
    public function finales()
    {
        $rinde = Rinde::all();
        $materia = Materia::all();
        return view ('alumno.historiaacademica')->with('rinde', $rinde)->with('materia', $materia);
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
}
