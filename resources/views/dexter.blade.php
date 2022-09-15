<!doctype html>
<html>
<head>
<title>Pokedex</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="30" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
    <div class="p-3 mb-0 bg-danger text-white">
<h1 class="text-capitalize">{{$json->name}}  #{{$json->id}}</h1>


</div>
<div class="container">
    <div class="row align-items-start">
      <div class="col" style="height: 500px; background-color: rgba(119,136,153)">
        @php

        echo '<img src="'.$json->sprites->front_default.'" width="250">';
        echo '<img src="'.$json->sprites->back_default.'" width="250">';

         @endphp

      </div>
      <div class="col" style="height: 500px; background-color: rgba(72, 113, 247);, 1"; >

        <h2>Información</h2><br>
        <h4 class="text-center">Tipos </h4>

       @foreach ($json->types as $key=>$value)
       <p class="text-capitalize text-center" >{{$json->types[$key]->type->name}}</p>
       @endforeach
       <h4 class="text-center">Descripción </h4>
       <p class="text-center">{{$description}}</p>
       <h4 class="text-center">Caracteristicas </h4>
       <p class="text-center">{{($json->height)*10}} Centimetros {{($json->weight)/10}} Kiloramos</p>
        <div >
            <div style="margin: 0 auto; width: 656px; text-align: center;">
                <button class="btn btn-light" onClick="window.location.reload();"  type="button">Nuevo Pokemon</button>
                <a href="{{ url('/pokemon-guardados') }}" class="btn btn-xs btn-info pull-right">Mostrar Pokemon Guardados</a>
              </div>

        </div>

      </div>


    </div>


</body>
</html>
