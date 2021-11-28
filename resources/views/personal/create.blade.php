@extends('layouts.app')
@section('content')
<h2>NUEVA ALARMA</h2>

<form action="{{ route('personal.store') }}"  method="POST">
    @csrf
    <input placeholder="alarma" type="text" value="{{ old('alarma') }}" name="alarma" id="">
    <hr>
    <input placeholder="lugar" type="text" value="{{ old('lugar') }}" name="lugar" id="">
    <hr>
    <input type="submit" values="enviar">

</form>
@endsection 