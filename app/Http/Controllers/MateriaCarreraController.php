<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Carrera;
use App\Models\MateriaCarrera;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class MateriaCarreraController extends Controller
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
        $materias = Materia::orderBy("nombre")->get();
        $carreras = Carrera::orderBy("nombre")->get();
        return view('administrador.cargarmateriacarrera')->with('materias',$materias)->with('carreras',$carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $materia_carrera = new MateriaCarrera();
            $materia_carrera->id_carrera = $request->get('carrera');
            $materia_carrera->id_materia = $request->get('materia');

            $materia_carrera->save();

            return redirect('/administrador')->with('estado','La materia fue añadida correctamente');
        }catch(\Exception $e){
            return redirect('/administrador')->with('warning','La materia ya estaba asociada a la carrera');
        }

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
