<!-- Mostra o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
    <br>
    <h2>Todos os utilizadores</h2>
    <br>

    <!-- Comentar um bloco de código com HTML e PHP -->
    {{--
    <p><i>{{ $hello }}</i></p>
    <p><i>{{ $isItMe }}</i></p>
    <p>Hoje é {{ $daysOfWeek[4] }}!</p>
    <br>
    <p><b>Nome do curso:</b> {{ $info['name'] }}</p>
    <p><b>Módulo:</b> {{ $info['modules'][0] }}</p>
    <!-- Chama a posição 0 porque é o primeiro sem key -->
    <p><b>Aluno:</b> {{ $info[0][3] }}</p>
    --}}

    <form method="GET">
        <input type="text" value="" name="search" id="">
        <button class="btn btn-secondary" type="submit">Procurar</button>
    </form>
<br>
    <!-- Se ocorrer uma session de criar novo user, mostra o conteúdo -->
    @if (session('message_create'))
        <div class="alert alert-success">Utilizador inserido com sucesso.</div>
        <!-- Final do if -->
    @endif

    <!-- Se ocorrer uma session de fazer update aos dados, mostra o conteúdo -->
    @if (session('message_update'))
        <div class="alert alert-success">Dados actualizados com sucesso.</div>
        <!-- Final do if -->
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contacto</th>
                <th>E-mail</th>
                <th style="width: 0px"></th>
                <th style="width: 0px"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Ciclo for each para cada um dos elementos -->
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- @auth --}}
                    <td><a href=" {{ route('users.view', $user->id) }}" class="btn btn-primary">Editar</a></td>
                    <td><a href=" {{ route('users.delete', $user->id) }}" class="btn btn-danger">Eliminar</a></td>
                    {{-- @endauth --}}
                </tr>
                <!--Fechar o ciclo for each -->
            @endforeach
        </tbody>
    </table>
    <!-- Fechar a secção -->
@endsection
