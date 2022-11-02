<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrera;
use App\Models\Inscripto;
use Illuminate\Support\Facades\DB;
use Auth;

class CarreraController extends Controller
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
        return view('administrador.cargarcarrera');
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
                'nombre' => 'required|max:255|string',
                'plan' => 'required|numeric',
                'depto' => 'required|max:255|string',
            ]);
            $carreras = new Carrera();
            $carreras->nombre = $request->get('nombre');
            $carreras->numero_plan = $request->get('plan');
            $carreras->departamento = $request->get('depto');

            $carreras->save();

            return redirect('/administrador')->with('estado','La carrera fue creada correctamente.');
        }catch(\Exception $e){
            return redirect('/administrador')->with('warning','El nombre de la carrera ya se encuentra cargado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $carreras = Carrera::all();
        return view ('administrador.mostrarcarreras') -> with ('carreras',$carreras);
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

    public function mostrar_carreras_alumno(){
        $LU = Auth::user()->LU;
        $carrerasinscripto = Inscripto::all()->where('LU_alumno',$LU);

        return view('alumno.mostrarcarrerasinscriptas')->with('carrerasinscripto', $carrerasinscripto);
    }
}
