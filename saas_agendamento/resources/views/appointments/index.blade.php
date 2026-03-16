@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Agendamentos</h1>

    <a href="/{{ request()->route('tenant') }}/appointments/create">
        Novo Agendamento
    </a>

    <hr>

    @foreach($appointments as $appointment)

        <div>

            <strong>Cliente:</strong> {{ $appointment->client->name }} <br>

            <strong>Serviço:</strong> {{ $appointment->service->name }} <br>

            <strong>Profissional:</strong> {{ $appointment->professional->name }} <br>

            <strong>Horário:</strong>
            {{ \Carbon\Carbon::parse($appointment->start_time)->format('d/m/Y H:i') }}

        </div>

        <hr>

    @endforeach

</div>

@endsection