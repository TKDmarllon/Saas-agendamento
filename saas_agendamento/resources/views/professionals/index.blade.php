@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Profissionais</h1>

    <a href="/{{ request()->route('tenant') }}/professionals/create">
        Novo Profissional
    </a>

    <hr>

    @foreach($professionals as $professional)

        <div>
            <strong>{{ $professional->name }}</strong>

            @if($professional->bio)
                <p>{{ $professional->bio }}</p>
            @endif
        </div>

        <hr>

    @endforeach

</div>

@endsection