<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\MateriaCarrera;
use App\Models\CorrelativaCursada;
use App\Models\CorrelativaAprobada;
use Illuminate\Support\Facades\DB;

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
        $correlativas_aprobadas = CorrelativaAprobada::all()->where('id_materia',$id_materia);
        $correlativas_cursadas = CorrelativaCursada::all()->where('id_materia',$id_materia);

        return view('administrador.cargarcorrelativas')->with('materias',$materias)->with('carrera',$carrera)->with('materia', $materia)->with('correlativas_fuertes',$correlativas_aprobadas)->with('correlativas_debiles',$correlativas_cursadas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_carrera, $id_materia)
    {
        $materia = Materia::find($id_materia);

        $fuertes = $request->input('materias_fuertes');
        $debiles = $request->input('materias_debiles');

        try{
            DB::beginTransaction();
            $materia->correlativaaprobadas()->detach();
            $materia->correlativacursadas()->detach();

            foreach((array) $fuertes as $fuerte){
                $correlativa = new CorrelativaAprobada();
                $correlativa-> id_correlativa_fuerte = $fuerte;
                $correlativa-> id_materia = $id_materia;
                $correlativa-> id_carrera = $id_carrera;
                $correlativa->save();
            }

            foreach((array) $debiles as $debil){
                $correlativa = new CorrelativaCursada();
                $correlativa-> id_correlativa_debil = $debil;
                $correlativa-> id_materia = $id_materia;
                $correlativa-> id_carrera = $id_carrera;
                $correlativa->save();
            }

            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            return redirect('/administrador')->with('warning','Alguna de las materias seleccionadas ya es una correlativa.');
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
