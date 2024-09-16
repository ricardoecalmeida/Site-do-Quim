@extends('layouts.femaster')

@section('content')

@auth
        <br>
        <div>
        @if (Auth::user()->user_type ==1) <!-- Caso o user autenticado seja 1 (admin) -->
            <div class="alert alert-dark"> <!-- Caixa de alert do Bootstrap -->
                Conta de Administrador <!-- Mensagem apresentada na caixa de alert -->
            {{ session('message_admin') }} <!-- Não aparece -->
            </div>
        @endif

        <div>
            <h3>Olá, {{ Auth::user()->name }}!<h3> <!-- Diz olá ao nome do user autenticado, independentemente do tipo de user -->
        </div>
    @endauth

    <!--
    {{--
        @auth
    @if ($message)
    <div class="alert alert-success">
        <p>És admin desta app.</p>
    </div>
    @endif
    @endauth
    --}}
    -->

@endsection