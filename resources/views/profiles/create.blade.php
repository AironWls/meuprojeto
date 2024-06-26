@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Cadastrar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Cadastrar Perfil</div>
        <div class="card-body">
            @include('profiles.form', ['action' => route('profiles.store'), 'update' => false ])
        </div>
        <div class="card-footer">
        <a title="Listar Perfis" href="{{ route('profiles.index') }}" class="btn btn-sm btn-secondary rounded-0"><i class="fa-solid fa-list"></i></a>
        </div>
    </div>
</div>

@endsection
