@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Novo Cliente</h1>

    <form method="POST" action="/{{ request()->route('tenant') }}/clients">

        @csrf

        <div>
            <label>Nome</label>
            <input type="text" name="name" required>
        </div>

        <br>

        <div>
            <label>Telefone</label>
            <input type="text" name="phone">
        </div>

        <br>

        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <br>

        <button type="submit">
            Salvar
        </button>

    </form>

</div>

@endsection