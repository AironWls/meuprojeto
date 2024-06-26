@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => "Usuário", 'action' => "Adicionar Perfil ao Usuário"])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Adicionar Perfil ao Usuário</div>
        <div class="card-body">
            <form action="{{ route('users.save_profile_to_user', $user) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="profile_id" class="form-label">Perfil</label>
                    <select name="profile_id[]" id="profile_id" class="form-select form-select-sm rounded-0" multiple>
                        <option value="">Selecione</option>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-sm btn-primary rounded-0"> Salvar <i class="fa-solid fa-floppy-disk"></i></button>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary rounded-0"><i class="fa-solid fa-list"></i></a>
        </div>
    </div>
</div>

@endsection
