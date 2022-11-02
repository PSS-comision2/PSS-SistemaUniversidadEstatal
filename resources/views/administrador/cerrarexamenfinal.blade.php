<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cerrar mesa de examen final</title>
</head>

<body>
    @include('administrador.layouts.navbar')

    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cerrarexamenfinal" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Cerrar mesa de examen</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Final</span></label>
                    <select class="select select-bordered w-full" name="final" id="final" tabindex="1">
                        @foreach ($finales as $final)
                            <option value="{{$final->id}}"> {{ $final->materia->nombre }} - {{ $final->id_materia }} - {{ $final->fecha }} - {{ $final->hora }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administrador" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Cerrar mesa</button>
                </div>
            </div>
        </form>
</body>

</html>
