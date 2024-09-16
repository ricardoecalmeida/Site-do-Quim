<!-- Mostra o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
    <br>
    <h2>Todas as tarefas</h2>
    <br>

    <!-- Se ocorrer uma session de criar novo user, mostra o conteúdo -->
    @if (session('message_create'))
        <div class="alert alert-success">
            {{ session('message_create') }}
        </div>
        <!-- Final do if -->
    @endif

    <!-- Se ocorrer uma session de fazer update aos dados, mostra o conteúdo -->
    @if (session('message_update'))
        <div class="alert alert-success">
            {{ session('message_update') }}
        </div>
        <!-- Final do if -->
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Estado</th>
                <th>Utilizador</th>
                <th style="width: 0px"></th>
                <th style="width: 0px"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Ciclo for each para cada um dos elementos -->
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->usname }}</td>
                    <td><a href=" {{ route('tasks.view', $task->id) }}" class="btn btn-primary">Editar</a></td>
                    <td><a href=" {{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Eliminar</a></td>
                </tr>
                <!--Fechar o ciclo for each -->
            @endforeach
        </tbody>
    </table>
    <!-- Fechar a secção -->
@endsection
