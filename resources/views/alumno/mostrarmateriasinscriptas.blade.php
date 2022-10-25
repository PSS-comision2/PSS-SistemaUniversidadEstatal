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
                @if(count($cursadas)>0)
                    <select class="select select-bordered w-full" name="materia" id="materia" tabindex="3">
                        @foreach ($cursadas as $cursada)
                            <option value="{{$cursada->id}}"> {{$cursada->materia->id}} - {{$cursada->materia->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <span class="mt-5">No está inscripto en ninguna materia en este cuatrimestre</span>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
