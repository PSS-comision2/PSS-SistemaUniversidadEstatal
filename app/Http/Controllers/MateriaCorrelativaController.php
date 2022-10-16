<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\MateriaCarrera;
use App\Models\CorrelativaCursada;
use App\Models\CorrelativaAprobada;

class MateriaCorrelativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::orderBy("nombre")->get();
        return view('administrador.materiacorrelativa')->with('carreras',$carreras);
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
    public function edit($id,$id_materia)
    {
        $carrera = Carrera::find($id);
        $materia = Materia::find($id_materia);
        $materias = MateriaCarrera::all()->where('id_carrera',$id)->where('id_materia','!=',$id_materia);

        return view('administrador.cargarcorrelativas')->with('materias',$materias)->with('carrera',$carrera)->with('materia', $materia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_materia, $id_carrera)
    {
        $fuertes = $request->input('materias_fuertes');
        $indice = 0;

        foreach((array) $fuertes as $fuerte){
            $correlativa = new CorrelativaAprobada();
            $correlativa-> id_correlativa_fuerte = $fuerte;
            $correlativa-> id_materia = $id_materia;
            $correlativa-> id_carrera = $id_carrera;
            $correlativa->save();
        }

        $debiles = $request->input('materias_debiles');
        $indice = 0;

        foreach((array) $debiles as $debil){
            $correlativa = new CorrelativaCursada();
            $correlativa-> id_correlativa_debil = $debil;
            $correlativa-> id_materia = $id_materia;
            $correlativa-> id_carrera = $id_carrera;
            $correlativa->save();
        }

        return redirect('/administrador')->with('estado','Se cargaron las correlativas correctamente.');
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
