<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Correlativas</title>
</head>

<body>
    @include('administrador.layouts.navbar')

    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cargarcorrelativas/{{$carrera->id}}/{{$materia->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Correlativas para {{$materia->nombre}}</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Débil</span></label>
                    <select class="select select-bordered w-full js-example-basic-multiple" name="materias_debiles[]" multiple="multiple">
                        @foreach ($materias as $materia_actual)
                            @if($correlativas_debiles->contains('id_correlativa_debil', $materia_actual->materia->id))
                                <option value={{ $materia_actual->materia->id }} selected> {{ $materia_actual->materia->nombre }}
                            @else
                                <option value={{ $materia_actual->materia->id }}> {{ $materia_actual->materia->nombre }}
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Fuerte</span></label>
                    <select class="select select-bordered w-full js-example-basic-multiple" name="materias_fuertes[]" multiple="multiple">
                        @foreach ($materias as $materia_actual)
                            <option value={{ $materia_actual->materia->id }}> {{ $materia_actual->materia->nombre }}
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administrador" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                </div>
            </div>
        </form>
</body>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

</html>
