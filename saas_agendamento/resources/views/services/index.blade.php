@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Serviços</h1>

<a href="/{{ app('tenant')->slug }}/services/create">    Novo Serviço
</a>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Duração (min)</th>
            </tr>
        </thead>

        <tbody>

        @foreach($services as $service)

            <tr>
                <td>{{ $service->name }}</td>
                <td>R$ {{ $service->price }}</td>
                <td>{{ $service->duration }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection