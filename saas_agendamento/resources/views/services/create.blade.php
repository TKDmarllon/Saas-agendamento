@extends('layouts.app')

@section('content')

<h1>Novo Serviço</h1>

<form method="POST" action="/{{ app('tenant')->slug }}/services">
        @csrf

    <div>
        <label>Nome</label><br>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Preço</label><br>
        <input type="text" name="price">
    </div>

    <br>

    <div>
        <label>Duração (minutos)</label><br>
        <input type="text" name="duration">
    </div>

    <br>

    <button type="submit">
        Salvar
    </button>

</form>

@endsection