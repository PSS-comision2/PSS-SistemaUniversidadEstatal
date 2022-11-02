<!DOCTYPE html>
<html data-theme="autumn">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Historia académica</title>
    </head>
    <body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-7xl mx-auto mt-12">
        <h2 class="card-title mx-auto">HISTORIA ACADÉMICA</h2>
        <div class="overflow-x-auto">
            <table class="table w-full text-center">
             <thead>
                <tr>
                  <th>Codigo materia</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Resultado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cursa as $materia_cursa)
                    <tr>
                        <th>{{$materia_cursa->id_materia}}</th>
                        <th>Cursada</th>
                        <th>{{$materia_cursa->materia->nombre}}</th>
                        <th>{{$materia_cursa->nota}}</th>
                    </tr>
                @endforeach


                @foreach ($rinde as $materia_rinde)
                    <tr>
                        <th>{{$materia_rinde->id}}</th>
                        <th>Final</th>
                        <th>{{$materia_rinde->final->materia->nombre}}</th>
                        <th>{{$materia_rinde->nota}}</th>
                    </tr>
                @endforeach

              </tbody>
            </table>

          </div>
    </div>

</body>

</html>
