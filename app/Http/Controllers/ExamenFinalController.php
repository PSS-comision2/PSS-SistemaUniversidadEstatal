<?php

namespace App\Http\Controllers;

use App\Models\ExamenFinal;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\Rinde;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;


class ExamenFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_profesor = Auth::user()->id;
        $finales = ExamenFinal::orderBy("fecha", "DESC")->get()->where('id_profesor', $id_profesor);
        return view('profesor.finales')->with('finales',$finales);
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
            'observaciones' => 'string|nullable',
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
        $final->observacion = $request->get('observaciones');
        $final->save();

        return redirect('/administrador')->with('estado','La mesa de examen fue creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $finales = ExamenFinal::all();
        return view ('administrador.mostrarfinales') -> with ('finales',$finales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $final = ExamenFinal::find($id);
        $alumnos_rinden = Rinde::all()->where('id_final',$id);

        return view('profesor.notas')->with('final',$final)->with('alumnos_rinden',$alumnos_rinden);
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
        $notas = $request->input('notas');
        $LUs = $request->input('LUs');
        $indice = 0;

        foreach((array) $LUs as $LU){
            $alumno_rinde = Rinde::all()->where('id_final',$id)->where('LU_alumno',$LU)->first();
            $alumno_rinde->nota = $notas[$indice++];
            $alumno_rinde->save();
        }

        return redirect('/profesor')->with('estado','Se cargaron las notas correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cerrar_mesa_impl(Request $request)
    {
       // dd($request);
        $id = $request->get('final');
        $final = ExamenFinal::find($id);
        $final->estado = 'Cerrado';
        $final->save();

        return redirect('/administrador')->with('estado','La mesa de examen fue cerrada correctamente.');
    }

    public function cerrar_mesa_vista() {

        $finales = ExamenFinal::all()->where('estado', 'Abierto');
    
        return view('administrador.cerrarexamenfinal')->with('finales', $finales);
    }

    public function mostrar_finales_alumno(){
        $LU = Auth::user()->LU;

        $finalessinrendir = Rinde::all()->where('LU_alumno',$LU)->whereNull('nota')->pluck('id_final')->toArray();
        $hoy = Carbon::today();
        $examenes_finales_filtrados = ExamenFinal::all()->whereIn('id',$finalessinrendir)->where('fecha', '>=', $hoy)->where('hora', '>=', date("H:i"));
        return view('alumno.mostrarfinalesinscriptos')->with('examenes_finales', $examenes_finales_filtrados);
    }
}
