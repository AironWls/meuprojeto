@extends('templates.layout')

@section('content')

@include('templates.subviews.validation')

@include('templates.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Editar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Editar Perfil</div>
        <div class="card-body">
            @include('profiles.form', ['action' => route('profiles.update', $profile), 'update' => true])
        </div>
        <div class="card-footer">
            <a href="{{ route('profiles.index') }}" class="btn btn-sm btn-secondary rounded-0" title="Listar perfis" aria-label="Listar perfis"><i class="fa-solid fa-list"></i></a>
            <a href="{{ route('profiles.show', $profile) }}" class="btn btn-sm btn-secondary rounded-0" title="Visualizar perfil" aria-label="Visualizar perfil"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
</div>

@endsection
