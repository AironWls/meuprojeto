@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => "Role", 'action' => 'Visualizar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Visualizar Role</div>
        <div class="card-body">
            <p><span class="fw-bold">ID:</span> {{ $role->id }}</p>
            <p><span class="fw-bold">Nome:</span> {{ $role->name }}</p>
            <p><span class="fw-bold">Status:</span> {{ $role->status === 1 ? 'Ativo' : 'Inativo' }}</p>
            <p><span class="fw-bold">Criado em:</span> {{ $role->created_at }}</p>
            <p><span class="fw-bold">Atualizado em:</span> {{ $role->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('roles.index') }}" title="Listar roles" aria-label="Listar roles"><i class="fa-solid fa-list"></i></a>
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('roles.edit', $role->id) }}" title="Editar role" aria-label="Editar role"><i class="fa-solid fa-edit"></i></a>
        </div>
    </div>
</div>

@endsection
