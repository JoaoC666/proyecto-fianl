@extends('layouts.app')
@section('content')
<h2>EDITANDO ALARMA</h2>

<form action="{{ route('personal.update',[$edper]) }}"  method="POST">
    @csrf
    @method('PUT')
    <input placeholder="alarma" type="text"  name="alarma" id="">
    <hr>
    <input placeholder="lugar" type="text"  name="lugar" id="">
    <hr>
    <input type="submit" values="enviar">

</form>
@endsection 