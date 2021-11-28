@extends('layouts.app')
@section('content')


<h3>alarmas</h3>
<div>
    <table>
        <a href="{{ route('personal.create') }}">nuevo</a>
        <tr>
            <td>
                alarma
            </td>
            
        </tr>  
        <tr>
            <td>
               lugar
            </td>
            
        </tr>          
        @foreach ( $listaLP as $item )            
        
        <tr>
            <td>
                {{ $item->alarma }}
            </td>

            <td>
                {{ $item->lugar }}
            </td>
           
           
            <td>
                <a href="{{route('personal.show',[$item])}}">🔎</a>
                <a href="{{route('personal.edit',[$item])}}">✎</a>
                <form action="{{route('personal.destroy',[$item])}}" method="post">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('esta seguro de borrar')" type="submit">❌</button>
                </form>
                </a> 
            </td>
        </tr>
       
        
        
    </table>
</div>
@endforeach
@endsection