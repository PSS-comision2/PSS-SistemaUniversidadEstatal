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
                    <h2 class="card-title mx-auto">Seleccione el final al que desea inscribirse</h2>
                    <select class="select select-bordered w-full" name="examenfinal" id="examenfinal" tabindex="3">                  
                    @foreach ($finales_nombre as $final_nombre)
                        <option value="{{$final_nombre->id}}">{{$final_nombre->nombre}}</option>
                    @endforeach
                    </select>
                    <div class="grid grid-cols-2 gap-4 content-center mt-10">                   
                        <a href="/alumno" class="btn btn-secondary " tabindex="7">Cancelar</a>                    
                        <button type="submit" class="btn btn-success" tabindex="8">Inscribirme</button> 
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
