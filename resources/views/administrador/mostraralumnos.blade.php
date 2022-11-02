<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Alumnos</title>
</head>
<body>
    @include('administrador.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-7xl mx-auto mt-12">
        <h2 class="card-title mx-auto">ALUMNOS</h2>
        <div class="overflow-x-auto">
            <table class="table w-full text-center">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>DNI</th>
                  <th>LU</th>
                  <th>Email</th>
                  <th>Celular</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <th>{{$alumno->nombre}}</th>
                        <th>{{$alumno->apellido}}</th>
                        <th>{{$alumno->DNI}}</th>
                        <th>{{$alumno->LU}}</th>
                        <th>{{$alumno->email}}</th>
                        <th>{{$alumno->celular}}</th>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>

</body>

</html>
