@extends('layouts.femaster')
@section('content')
<br>
<h2>Recuperar password</h2>
<br>
<hr>
<br>
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password confirmation</label>
      <input type="password" name="password_confirmation" class="form-control" id="inputPassword">
      <input type="hidden" name="token" value="{{ request()->route('token') }}">
    </div>
    <input type="hidden" name="token" value="{{ request()->route('token') }}">
    <button type="submit" class="btn btn-primary">Recuperar</button>
  </form>
  <br>
  <a class="btn btn-success" href="{{ route('main.index') }}">Voltar</a>
@endsection
