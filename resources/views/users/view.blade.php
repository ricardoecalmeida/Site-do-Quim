<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
<br>
    <h5>Editar dados do user "{{ $myUser->name}}"</h5>
    <hr>
    <br>

    <div class="container">
        <form method="POST" action="{{ route('users.update') }}">
            @csrf

            <input type="hidden" name="id" value={{ $myUser->id }} id="">

            <div class="mb-4">
                <label for="name_input" class="form-label">Nome</label>
                <input type="text" value="{{$myUser->name}}" name="name" class="form-control" id="name_input" required>
                @error('name')
                <div class="alert alert-danger">O nome inserido é inválido.</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email_input" class="form-label">Email</label>
                <input disabled type="email" value="{{$myUser->email}}" name="email" class="form-control" id="email_input">
            </div>

            <div class="mb-4">
                <label for="contact_input" class="form-label">Contacto</label>
                <input type="number" value="{{$myUser->phone}}" name="phone" class="form-control" id="contact_input" required>
                @error('name')
                <div class="alert alert-danger">O nome inserido é inválido.</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address_input" class="form-label">Morada</label>
                <input type="text" value="{{$myUser->address}}" name="address" class="form-control" id="address_input" required>
                @error('name')
                <div class="alert alert-danger">O nome inserido é inválido.</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('users.all') }}"><button type="button" class="btn btn-secondary">Voltar</button></a>
        </form>
        <br>
    </div>

@endsection
