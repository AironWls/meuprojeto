@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => 'Bem-Vindo'])

<div class="container">
    <div class="card">
        <div class="card-header">Página de boas vindas!</div>
        <div class="card-body">
            <p>Seja bem-vindo ao nosso sistema!</p>
        </div>
    </div>
</div>

@endsection
