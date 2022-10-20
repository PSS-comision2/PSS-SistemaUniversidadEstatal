<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.cargarprofesor');
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
                'legajo' => 'required|numeric',
                'nombre' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'dni' => 'required|numeric',
                'email' => 'required|max:255|string',
                'celular' => 'required|numeric',
            ]);
            $profesores = new Profesor();
            $profesores->legajo = $request->get('legajo');
            $profesores->nombre = $request->get('nombre');
            $profesores->apellido = $request->get('apellido');
            $profesores->DNI = $request->get('dni');
            $profesores->email = $request->get('email');
            $profesores->celular = $request->get('celular');
            $profesores->password =  Hash::make($request->get('legajo'));

            $profesores->save();

            return redirect('/administrador')->with('estado','El profesor fue creado correctamente.');
        }catch(\Exception $e){
            return redirect('/administrador')->with('warning','Ya existe un profesor con ese legajo, dni o email');
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
