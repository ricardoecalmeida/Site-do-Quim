<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')
<br>
<img src="https://www.cesaedigital.pt/wp-content/uploads/2016/07/logo_cesae-cores_horizontal_header_site.png" style="max-width: 33%">
<hr>
@auth
<div><h3>Olá, {{ Auth::user()->name }}!<h3></div>
@endauth
<br>
<p><b>Nome:</b> {{ $info['name'] }}</p>
<p><b>Morada:</b> {{ $info['address'] }}</p>
<p><b>E-mail:</b> {{ $info['email'] }}</p>

<!-- Fecha a secção -->
@endsection
