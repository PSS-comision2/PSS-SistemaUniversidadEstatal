<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Finales</title>
</head>

<body>
    @include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-5xl mx-auto mt-12">
        <h2 class="card-title mx-auto">FINALES</h2>
        <div class="overflow-x-auto">
            <table class="table w-full">
              <thead>
                <tr>
                  <th></th>
                  <th>Materia</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Ubicacion</th>
                  <th>Observacion</th>
                  <th>Notas</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($finales as $final)
                    <tr>
                        <th>{{$final->id}}</th>
                        <th>{{$final->materia->nombre}}</th>
                        <th>{{$final->fecha}}</th>
                        <th>{{$final->hora}}</th>
                        <th>{{$final->ubicacion}}</th>
                        <th>{{$final->observacion}}</th>
                        <th><a href="/profesor/cargarnotasfinal/{{$final->id}}" class="btn btn-secondary text-xl">+</a></th>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>

</body>

</html>
