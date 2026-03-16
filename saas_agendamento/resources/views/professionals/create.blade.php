@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Novo Profissional</h1>

    <form method="POST" action="/{{ request()->route('tenant') }}/professionals">

        @csrf

        <div>
            <label>Nome</label>
            <input type="text" name="name" required>
        </div>

        <br>

        <div>
            <label>Bio</label>
            <textarea name="bio"></textarea>
        </div>

        <br>

        <button type="submit">
            Salvar
        </button>

    </form>

</div>

@endsection