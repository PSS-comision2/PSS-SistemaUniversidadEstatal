<?php

namespace App\Http\Controllers;

use App\Models\Dicta;
use Illuminate\Http\Request;

use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
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
        $profesores = Profesor::orderBy("apellido")->get();
        return view('administrador.cargarmateria')->with('profesores', $profesores);
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
            $request->validate([
                'codigo' => 'required|numeric',
                'nombre' => 'required|max:255|string',
                'plan' => 'required|max:255|string',
                'profesor' => 'required|numeric',
            ]);
            $materias = new Materia();
            $materias->id = $request->get('codigo');
            $materias->nombre = $request->get('nombre');
            $materias->plan_pdf = $request->get('plan');

            $materias->save();

            $dicta = new Dicta();
            $dicta->id_materia = $request->get('codigo');
            $dicta->legajo = $request->get('profesor');

            $dicta ->save();

            return redirect('/administrador')->with('estado','La materia fue creada correctamente.');
        }catch(\Exception $e){
            return redirect('/administrador')->with('warning','El código o nombre de materia ingresado ya existe.');
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
