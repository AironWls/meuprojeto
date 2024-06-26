@extends('templates.layout')

@section('content')

    @include('templates.subviews.validation')

    @include('templates.subviews.breadcrumb', ['model' => 'User', 'action' => 'Cadastrar'])

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Cadastrar Perfil</div>
            <div class="card-body">
                @include('users.form', ['action' => route('users.store'), 'update' => false])
            </div>
            <div class="card-footer">
                <a title="Listar usuários" href="{{ route('users.index') }}" class="btn btn-sm btn-secondary rounded-0"><i
                        class="fa-solid fa-list"></i></a>
            </div>
        </div>
    </div>
@endsection
