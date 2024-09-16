<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
    <br>
    <h5>Editar dados da tarefa "{{ $myTask->name }}"</h5>
    <hr>
    <br>

    <div class="container">
        <form method="POST" action="{{ route('tasks.update') }}">
            @csrf

            <input type="hidden" name="id" value={{ $myTask->id }} id="">

            <div class="mb-4">
                <label for="name_input" class="form-label">Nome</label>
                <input type="text" value="{{ $myTask->name }}" name="name" class="form-control" id="name_input"
                    required>
                @error('name')
                    <div class="alert alert-danger">O nome inserido é inválido.</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description_input" class="form-label">Descrição</label>
                <input type="text" value="{{ $myTask->description }}" name="description" class="form-control"
                    id="description_input" required>
            </div>

            <div class="mb-4">
                <label for="due_at_input" class="form-label">Data</label>
                <input type="date" value="{{ $myTask->due_at }}" name="due_at" class="form-control" id="due_at_input">
            </div>

            <div class="mb-4">
                <label for="status_input" class="form-label">Estado</label>

                <div>
                    <input type="radio" class="btn-check" name="status" value="0" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-danger" for="danger-outlined">Pendente</label>
                    <input type="radio" class="btn-check" name="status" value="1" id="warning-outlined"
                        autocomplete="off">
                    <label class="btn btn-outline-warning" for="warning-outlined">Em andamento</label>
                    <input type="radio" class="btn-check" name="status" value="2" id="success-outlined"
                        autocomplete="off">
                    <label class="btn btn-outline-success" for="success-outlined">Concluído</label>
                </div>
            </div>

            <!-- Atribuir checked no input respectivo, consoante o {{ $myTask->status }} -->

            <div class="alert alert-light">
                Tarifa atribuída a <b>{{ $myTask->usname }}</b>.
            </div>

            <div class="mb-4">
                <label for="user_select" class="form-label">Utilizador</label>
                <select name="user_id" id="">
                    <option value="" selected> Seleccione um User</option>
                    @foreach ($users as $user)
                        <option @if ($user->id == $myTask->user_id) selected @endif value="{{ $user->id }}">
                            {{ $user->name }} </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class='alert alert-danger'>Utilizador inválido!</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('tasks.all') }}"><button type="button" class="btn btn-secondary">Voltar</button></a>

        </form>
    </div>
@endsection
