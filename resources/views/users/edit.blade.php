@extends('templates.layout')

@section('content')

@include('templates.subviews.validation')

@include('templates.subviews.breadcrumb', ['model' => 'Usuário', 'action' => 'Editar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Editar Usuário</div>
        <div class="card-body">
            @include('users.form', ['action' => route('users.update', $user), 'update' => true])
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary rounded-0" title="Listar usuários" aria-label="Listar usuários"><i class="fa-solid fa-list"></i></a>
            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-secondary rounded-0" title="Visualizar usuário" aria-label="Visualizar usuário"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
</div>

@endsection
