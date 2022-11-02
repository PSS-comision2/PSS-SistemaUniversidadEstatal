<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Materias Inscriptas</title>
</head>

<body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-2xl  mx-auto mt-12">
        <h2 class="card-title mx-auto">MIS MATERIAS</h2>
        <div class="card bg-base-100 shadow-xl max-w-2xl mx-auto mx-12 my-12">
            <div class="overflow-x-auto">
                @if(count($cursadas)>0)
                    <select class="select select-bordered w-full" name="materia" id="materia" tabindex="3">
                        @foreach ($cursadas as $cursada)
                            <option value="{{$cursada->id}}" profesor='{{$cursada->profesor->apellido}} {{$cursada->profesor->nombre}}' codigo='{{$cursada->materia->id}}'> {{$cursada->materia->id}} - {{$cursada->materia->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <span class="mt-5">No está inscripto en ninguna materia en este cuatrimestre</span>
                @endif
                @if(count($cursadas)>0)
                    <div class="card bg-base-100 ">
                        <div class="card-body">
                            <div class="grid grid-cols-2"></div>
                                <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Código
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$cursadas->first()->materia->id}}" id="materiacodigo" name="materiacodigo" disabled>
                                    </div>
                                  </div>
                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Profesor
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$cursadas->first()->profesor->apellido}} {{$cursadas->first()->profesor->nombre }}"id="materianombre" name="materianombre" disabled>
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
        var select = document.getElementById("materia");
        var codigo = document.getElementById("materiacodigo");
        var nombreapellido = document.getElementById("materianombre");

        select.onchange = function(event){
            codigo.value = event.target.options[event.target.selectedIndex].getAttribute('codigo');
            nombreapellido.value = event.target.options[event.target.selectedIndex].getAttribute('profesor');
        };
    </script>

</body>

</html>
