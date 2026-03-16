@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Novo Agendamento</h1>

    <form method="POST" action="/{{ request()->route('tenant') }}/appointments">

        @csrf

        <div>
            <label>Cliente</label>
            <select name="client_id" required>

                @foreach($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <br>

        <div>
            <label>Serviço</label>
            <select name="service_id" required>

                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }} - R$ {{ $service->price }}
                    </option>
                @endforeach

            </select>
        </div>

        <br>

        <div>
            <label>Profissional</label>
            <select name="professional_id" required>

                @foreach($professionals as $professional)
                    <option value="{{ $professional->id }}">
                        {{ $professional->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <br>

        <div>
            <label>Data e Hora</label>
            <input type="datetime-local" name="start_time" required>
        </div>

        <br>

        <button type="submit">
            Agendar
        </button>

    </form>

</div>

@endsection