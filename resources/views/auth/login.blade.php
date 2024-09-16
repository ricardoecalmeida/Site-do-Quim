@extends('layouts.femaster')
@section('content')
<br>
<h2>Iniciar sessão</h2>
<br>
<hr>
<br>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="{{route('password.request')}}">Esqueceu a password?</a>
  </form>
  
@endsection
