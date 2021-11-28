@extends('layouts.app')
@section('content')


<table>
    <H3>cliente</H3>
    <a href="{{ route('cliente.create') }}">nuevo</a>
    <tr>
        <td>
            Nombre
        </td>
   
        <td>
            Apellido
        </td>
    
        <td>
            Celular
        </td>
    
        <td>
            alarma
        </td>
    </tr>
@foreach ($listacl as $item )

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
        {{ $item->alarma }}
  </td>

    <td>
        <a href="{{route('cliente.show',[$item])}}">🔎</a>
        <a href="{{route('cliente.edit',[$item])}}">✎</a>
        <form action="{{route('cliente.destroy',[$item])}}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('esta seguro de borrar')" type="submit">❌</button>
        </form>
        </a> 
    </td>


</tr>
@endforeach
</table>
    

{{$listacl->links()}}
@endsection
