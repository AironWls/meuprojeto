@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => 'Role', 'action' => 'Cadastrar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Cadastrar Role</div>
        <div class="card-body">
            @include('roles.form', ['action' => route('roles.store'), 'update' => false ])
        </div>
        <div class="card-footer">
        <a title="Listar roles" href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary rounded-0"><i class="fa-solid fa-list"></i></a>
        </div>
    </div>
</div>

@endsection
