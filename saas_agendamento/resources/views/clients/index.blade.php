@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Clientes</h1>

    <a href="/{{ request()->route('tenant') }}/clients/create">
        Novo Cliente
    </a>

    <hr>

    @foreach($clients as $client)

        <div>

            <strong>{{ $client->name }}</strong>

            @if($client->phone)
                <p>Telefone: {{ $client->phone }}</p>
            @endif

            @if($client->email)
                <p>Email: {{ $client->email }}</p>
            @endif

        </div>

        <hr>

    @endforeach

</div>

@endsection