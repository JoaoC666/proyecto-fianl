@extends('layouts.app')
@section('content')
<h2>EDITANDO ADMIN</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err )
                <li>{{ $err }}</li>
            @endforeach        
        </ul>
    </div>
@endif
<form action="{{ route('administracion.update',[$admin]) }}"  method="POST">
    @csrf
    @method('PUT')
    <input placeholder="nombre" type="text"   name="nombre" id="">
    <hr color="green" size=1 width="150">
    <input placeholder="apellido" type="text"  name="apellido" id="">
    <hr color="green" size=1 width="150">
    <input placeholder="celular" type="number"  name="celular" id="">    
    <hr color="green" size=1 width="150">    
    <input type="submit" values="enviar">

</form>
@endsection 