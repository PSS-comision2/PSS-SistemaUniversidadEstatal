<?php

namespace App\Http\Controllers;

use App\Models\ExamenFinal;
use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Http\Request;


class ExamenFinalController extends Controller
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
        $profesores = Profesor::orderBy("apellido")->get();
        return view('administrador.cargarfinal')->with('materias',$materias)->with('profesores',$profesores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'observaciones' => 'string',
            'ubicacion' => 'required|string',
            'profesor' => 'required|string',
            'materia' => 'required|string',
        ]);
        $final = new ExamenFinal();
        $final->fecha = $request->get('fecha');
        $final->hora = $request->get('hora');
        $final->ubicacion = $request->get('ubicacion');
        $final->id_materia = $request->get('materia');
        $final->id_profesor = $request->get('profesor');
        $final->save();

        return redirect('/administrador');
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
