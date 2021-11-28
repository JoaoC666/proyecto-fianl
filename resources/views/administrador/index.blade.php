@extends('layouts.app')
@section('content')


<table>
    <H3>administrador</H3>
    <a href="{{ route('administracion.create') }}">nuevo</a>
    <hr>
    <a href="{{ route('cliente.index') }}">agregar cliente</a>
    <hr>
    <a href="{{ route('personal.index') }}">agregar alarma</a>
    <tr>
        <td>
            Nombre
        </td>
    </tr>

    <tr>
        <td>
            Apellido
        </td>
    </tr>

    <tr>
        <td>
            Celular
        </td>
    </tr>
@foreach ($lista as $item )

<tr>

    <td>
        {{ $item->nombre }}
    </td>

    <td>
        {{ $item->apellido }}
    </td>
    <td> 
          {{ $item->celular }}
    </td>

    <td>
        <a href="{{route('administracion.show',[$item])}}">🔎</a>
        <a href="{{route('administracion.edit',[$item])}}">✎</a>
        <form action="{{route('administracion.destroy',[$item])}}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('esta seguro de borrar')" type="submit">❌</button>
        </form>
        </a> 
    </td>


</tr>
</table>
    
@endforeach
@endsection
