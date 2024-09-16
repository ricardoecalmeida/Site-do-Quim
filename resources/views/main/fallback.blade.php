<!-- Vai buscar o layout femaster -->
@extends('layouts.femaster')

<!-- Indica o início de uma secção -->
@section('content')

    <h1>Estás perdido!</h1>
    <p>Clica <a href="{{route('main.index')}}">aqui</a> para voltar a casa.</p>

<!-- Fecha a secção -->
@endsection
