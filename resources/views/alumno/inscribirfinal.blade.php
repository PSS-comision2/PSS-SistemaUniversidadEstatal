<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscribir a final</title>
</head>
    <body>
        @include('alumno.layouts.navbar')
        <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
            <form action="/alumno/inscribirfinal" method="POST">
                @csrf
                <div class="mx-5 my-5">
                    @if(count($finales)>0)
                    <h2 class="card-title mx-auto">Seleccione el final al que desea inscribirse</h2>
                        <select class="select select-bordered w-full" name="examenfinal" id="examenfinal" tabindex="3">
                        @foreach ($finales as $final)
                            <option value="{{$final->id}}" nombre='{{$final->materia->nombre}}' fecha='{{$final->fecha}}' hora='{{$final->hora}}' ubicacion='{{$final->ubicacion}}' profesor='{{$final->profesor->nombre}} {{$final->profesor->apellido}}' observacion='{{$final->observacion}}'>{{$final->materia->nombre}} - {{$final->fecha}} - {{$final->hora}}</option>
                        @endforeach
                        </select>
                    @else
                        <span class="mt-5">No hay finales a los que se pueda inscribir</span>
                    @endif
                    @if(count($finales)>0)
                        <div class="card bg-base-100 ">
                            <div class="card-body">
                                <h2 class="card-title" id="examennombre"> {{$finales[0]->materia->nombre}}</h2>
                                <h3 class="card-title" id="examenprofesor"> {{$finales[0]->profesor->nombre}} {{$finales[0]->profesor->apellido}}</h2>
                                <h3 class="card-subtitle" id="examenfechahora">{{$finales[0]->ubicacion}} - {{$finales[0]->fecha}} - {{$finales[0]->hora}}</h2>
                                <p id="observacion">{{$finales[0]->observacion}}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 content-center mt-3">
                            <a href="/alumno" class="btn btn-secondary " tabindex="7">Cancelar</a>
                            <button type="submit" class="btn btn-success" tabindex="8">Inscribirme</button>
                        </div>
                    @endif

                </div>
            </form>
        </div>
    </body>

    <script>
        var select = document.getElementById("examenfinal");
        var nombre = document.getElementById("examennombre");
        var fechahora = document.getElementById("examenfechahora");
        var observacion = document.getElementById("observacion");
        var profesor = document.getElementById("examenprofesor");

        select.onchange = function(event){
            nombre.innerHTML = event.target.options[event.target.selectedIndex].getAttribute('nombre');
            fechahora.innerHTML = `${event.target.options[event.target.selectedIndex].getAttribute('ubicacion')} - ${event.target.options[event.target.selectedIndex].getAttribute('fecha')} - ${event.target.options[event.target.selectedIndex].getAttribute('hora')}`;
            observacion.innerHTML = event.target.options[event.target.selectedIndex].getAttribute('observacion');
            profesor.innerHTML = event.target.options[event.target.selectedIndex].getAttribute('profesor');
        };
    </script>
</html>
