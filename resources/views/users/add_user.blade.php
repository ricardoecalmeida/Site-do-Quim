<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
    <br>
    <h2>Adicionar utilizador</h2>
    <br>
    <div class="container">
        <form method="POST" action="{{ route('users.create') }}">
            @csrf {{-- Token para impedir SQL injection --}}
            <div class="mb-4">
                <label for="name_input" class="form-label">Nome</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                    id="name_input" required>
                @error('name')
                    <div class="alert alert-danger">O nome inserido é inválido.</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email_input" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                    id="email_input" required>
                @error('email')
                    <div class="alert alert-danger">O email inserido já se encontra registado.</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_input" class="form-label">Password</label>
                <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                    id="password_input" required>
            </div>
            <button type="submit" class="btn btn-success">Submeter</button>
            <a href="{{ route('main.index') }}"><input class="btn btn-secondary" value="Voltar"></a>
        </form>
        <br>
    </div>

    <!-- Fecha a secção -->
@endsection
