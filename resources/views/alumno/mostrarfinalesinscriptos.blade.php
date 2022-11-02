<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Finales inscriptos</title>
</head>

<body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-2xl  mx-auto mt-12">
        <h2 class="card-title mx-auto">MIS FINALES</h2>
        <div class="card bg-base-100 shadow-xl max-w-2xl mx-auto mx-12 my-12">
            <div class="overflow-x-auto">
                @if(count($examenes_finales)>0)
                    <select class="select select-bordered w-full" name="final" id="final" tabindex="3">
                        @foreach ($examenes_finales as $examen)
                            <option value="{{$examen->id}}" profesor='{{$examen->profesor->nombre}} {{$examen->profesor->apellido}}' ubicacion='{{$examen->ubicacion}}' fecha='{{$examen->fecha}}' hora='{{$examen->hora}}' observaciones='{{$examen->observaciones}}'> {{$examen->materia->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <span class="mt-5">No está inscripto en ningun final que pueda rendir</span>
                @endif

                @if(count($examenes_finales)>0)
                    <div class="card bg-base-100 ">
                        <div class="card-body">
                            <div class="grid grid-cols-2"></div>
                                <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Profesor
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$examenes_finales[0]->profesor->nombre}} {{$examenes_finales[0]->profesor->apellido}}" id="examenprofesor" name="examenprofesor" disabled>
                                    </div>
                                  </div>

                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Ubicacion
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$examenes_finales[0]->ubicacion}}"id="examenubicacion" name="examenubicacion" disabled>
                                    </div>
                                  </div>

                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Fecha
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$examenes_finales[0]->fecha}}"id="examenfecha" name="examenfecha" disabled>
                                    </div>
                                  </div>

                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Hora
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$examenes_finales[0]->hora}}"id="examenhora" name="examenhora" disabled>
                                    </div>
                                  </div>

                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Observaciones
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="textarea" value="{{$examenes_finales[0]->observacion}}"id="examenobservaciones" name="examenobservaciones" disabled>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        var select = document.getElementById("final");
        var profesor = document.getElementById("examenprofesor");
        var ubicacion = document.getElementById("examenubicacion");
        var fecha = document.getElementById("examenfecha");
        var hora = document.getElementById("examenhora");
        var observaciones = document.getElementById("examenobservaciones");

        select.onchange = function(event){
            profesor.value = event.target.options[event.target.selectedIndex].getAttribute('profesor');
            ubicacion.value = event.target.options[event.target.selectedIndex].getAttribute('ubicacion');
            fecha.value = event.target.options[event.target.selectedIndex].getAttribute('fecha');
            hora.value = event.target.options[event.target.selectedIndex].getAttribute('hora');
            observaciones.value = event.target.options[event.target.selectedIndex].getAttribute('observaciones');
        };
    </script>
</body>

</html>
