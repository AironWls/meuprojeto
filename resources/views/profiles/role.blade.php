@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Adicionar Role ao Perfil'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Adicionar Role ao Perfil <span class="fw-bold">{{ $profile->name }}</span></div>
        <div class="card-body">
            <form action="{{ route('profiles.save_role_to_profile', $profile) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id[]" id="role_id" class="form-select form-select-sm" multiple required>
                        <option value="">Selecione</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-sm btn-primary rounded-0"> Salvar <i class="fa-solid fa-floppy-disk"></i></button>
            </form>
        </div>
        <div class="card-footer">
            <a title="Listar perfis" aria-label="Listar perfis" href="{{ route('profiles.index') }}" class="btn btn-sm btn-secondary rounded-0"><i class="fa-solid fa-list"></i></a>
            <a title="visualizar perfil" aria-label="visualizar perfil" href="{{ route('profiles.show', $profile) }}" class="btn btn-sm btn-secondary rounded-0"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
</div>

@endsection
