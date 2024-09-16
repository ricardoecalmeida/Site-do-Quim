<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
    <div class="container">
        <br>
        <h2>Adicionar tarefa</h2>
        <br>
        <form method="POST" action="{{ route('tasks.create') }}">
            @csrf {{-- Token para impedir SQL injection --}}
            <div class="mb-4">
                <label for="name_input" class="form-label">Nome</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name_input" required>
                @error('name')
                    <div class='alert alert-danger'>Tarefa inválida!</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description_input" class="form-label">Descrição</label>
                <input type="text" value="{{ old('description') }}" name="description" class="form-control"
                    id="description_input" required>
                @error('description')
                    <div class='alert alert-danger'>Descrição inválida!</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="user_select" class="form-label">Utilizador</label>
                <select name="user_id" id="">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class='alert alert-danger'>Utilizador inválido!</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submeter</button>
            <a href="{{ route('main.index') }}"><input class="btn btn-secondary" value="Voltar"></a>
        </form>
    </div>

    <!-- Fecha a secção -->
@endsection
