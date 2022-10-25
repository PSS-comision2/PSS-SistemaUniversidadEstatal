<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Carreras inscriptas</title>
</head>

<body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-2xl  mx-auto mt-12">
        <h2 class="card-title mx-auto">MIS CARRERAS</h2>

        <div class="card bg-base-100 shadow-xl max-w-2xl mx-auto mx-12 my-12">
            <div class="overflow-x-auto">
                @if(count($carrerasinscripto)>0)
                    <select class="select select-bordered w-full" name="carrera" id="carrera" tabindex="3">
                        @foreach ($carrerasinscripto as $inscripcion)
                            <option value="{{$inscripcion->carrera->id}}" nombre='{{$inscripcion->carrera->nombre}}' numero_plan='{{$inscripcion->carrera->numero_plan}}' departamento='{{$inscripcion->carrera->departamento}}'>{{$inscripcion->carrera->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <span class="mt-5">No está inscripto en ninguna carrera</span>
                @endif
                @if(count($carrerasinscripto)>0)
                    <div class="card bg-base-100 ">
                        <div class="card-body">
                            <div class="grid grid-cols-2"></div>
                                <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Num. plan
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$carrerasinscripto[0]->carrera->numero_plan}}" id="carreranumeroplan" name="carreranumeroplan" disabled>
                                    </div>
                                  </div>

                                  <div class="2xl:flex 2xl:items-center mb-6">
                                    <div class="2xl:w-1/3">
                                      <label class="block text-gray-500 font-bold 2xl:text-right mb-1 2xl:mb-0 pr-4" for="inline-full-name">
                                        Departamento
                                      </label>
                                    </div>
                                    <div class="2xl:w-2/3">
                                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" value="{{$carrerasinscripto[0]->carrera->departamento}}"id="carreradepartamento" name="carreradepartamento" disabled>
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
        var select = document.getElementById("carrera");
        var numero_plan = document.getElementById("carreranumeroplan");
        var departamento = document.getElementById("carreradepartamento");

        select.onchange = function(event){
            numero_plan.value = event.target.options[event.target.selectedIndex].getAttribute('numero_plan');;
            departamento.value = event.target.options[event.target.selectedIndex].getAttribute('departamento');
        };
    </script>
</body>

</html>
