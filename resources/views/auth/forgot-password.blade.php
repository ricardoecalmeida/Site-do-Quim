@extends('layouts.femaster')
@section('content')
<br>
<h2>Recuperar password</h2>
<br>
<hr>
<br>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail">
    </div>
    <button type="submit" class="btn btn-primary">Recuperar</button>
  </form>
  <br>
  <a class="btn btn-secondary" href="{{ route('main.index') }}">Voltar</a>
@endsection
