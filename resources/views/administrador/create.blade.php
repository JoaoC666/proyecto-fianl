@extends('layouts.app')
@section('content')
<h2>NUEVO</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err )
                <li>{{ $err }}</li>
            @endforeach        
        </ul>
    </div>
@endif
<form action="{{ route('administracion.store') }}"  method="POST">
    @csrf
    <input placeholder="nombre" type="text" value="{{ old('nombre') }}" name="nombre" id="">
    <hr color="green" size=1 width="150">
    <input placeholder="apellido" type="text" value="{{ old('apellido') }}" name="apellido" id="">
    <hr color="green" size=1 width="150">
    <input placeholder="celular" type="number" value="{{ old('celular') }}" name="celular" id="">    
    <hr color="green" size=1 width="150">    
    <input type="submit" values="enviar">

</form>
@endsection 