<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Inscripto;
use Illuminate\Support\Facades\Hash;
use Auth;

class AlumnoController extends Controller
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
        return view('administrador.cargaralumno');
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
                'lu' => 'required|numeric',
                'nombre' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'dni' => 'required|numeric',
                'email' => 'required|max:255|string',
                'celular' => 'required|numeric',
            ]);
            $alumnos = new Alumno();
            $alumnos->LU = $request->get('lu');
            $alumnos->nombre = $request->get('nombre');
            $alumnos->apellido = $request->get('apellido');
            $alumnos->DNI = $request->get('dni');
            $alumnos->email = $request->get('email');
            $alumnos->celular = $request->get('celular');
            $alumnos->password =  Hash::make($request->get('lu'));

            $alumnos->save();

            return redirect('/administrador')->with('estado','El alumno fue creado correctamente.');
        }catch(\Exception $e){
            return redirect('/administrador')->with('warning','Ya existe un alumno con ese LU, DNI o email');
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

    public function inscribir_alumno_carrera(){
        $LU = Auth::user()->LU;
        $carrerasinscripto = Inscripto::all()->where('LU_alumno',$LU)->pluck('id_carrera')->toArray();
        $carreras = Carrera::whereNotIn('id',$carrerasinscripto)->get();

        return view('alumno.inscribircarrera')->with('carreras', $carreras)->with('carrerasinscripto', $carrerasinscripto);
    }

    public function guardar_alumno_carrera(Request $request){
        $inscripcion = new Inscripto();

        $inscripcion->LU_alumno = Auth::user()->LU;
        $inscripcion->id_carrera = $request->get('carrera');

        $inscripcion->save();

        return redirect('/alumno')->with('estado','La inscripción se realizó correctamente.');
    }
}
