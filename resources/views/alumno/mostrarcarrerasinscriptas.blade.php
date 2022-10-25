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
    <div class="card bg-base-100 shadow-2xl max-w-7xl mx-auto mt-12">
        <h2 class="card-title mx-auto">MIS CARRERAS</h2>
        <div class="overflow-x-auto">
            <table class="table w-full text-center">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Numero de plan</th>
                  <th>Departamento</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($carrerasinscripto as $inscripto)
                    <tr>
                        <th>{{$inscripto->carrera->nombre}}</th>
                        <th>{{$inscripto->carrera->numero_plan}}</th>
                        <th>{{$inscripto->carrera->departamento}}</th>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>

</body>

</html>
