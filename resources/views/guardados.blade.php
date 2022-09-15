<!doctype html>
<html>
<head>
<title>Pokedex</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
    <div class="p-3 mb-0 bg-danger text-white">
        <h1 class="text-capitalize">Pokemons guardados</h1>
        <a  href="{{ url('/') }}" >Regresar</a>

        </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col"> Tipo(s)</th>
        <th scope="col">Imagen</th>


      </tr>
    </thead>
    <tbody>

        @foreach($pokemons as $pokemon=>$value)
        <tr>

        <th scope="row">{{$pokemon}}</th>
        <td>{{$value->name}}</td>
        <td>@foreach($apis[$pokemon]->types as $key=>$value2)
            {{$apis[$pokemon]->types[$key]->type->name}}
        @endforeach</td>
        <td>
            @php

        echo '<img src="'.$apis[$pokemon]->sprites->front_default.'" width="250">';


         @endphp
        </td>


        @endforeach
      </tr>

    </tbody>
  </table>

</body>
