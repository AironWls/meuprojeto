@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => "Perfil", 'action' => 'Visualizar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Visualizar Perfil</div>
        <div class="card-body">
            <p><span class="fw-bold">ID:</span> {{ $profile->id }}</p>
            <p><span class="fw-bold">Nome:</span> {{ $profile->name }}</p>
            <p><span class="fw-bold">Status:</span> {{ $profile->status === 1 ? 'Ativo' : 'Inativo' }}</p>
            <p><span class="fw-bold">Criado em:</span> {{ $profile->created_at }}</p>
            <p><span class="fw-bold">Atualizado em:</span> {{ $profile->updated_at }}</p>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-borderless table-hover">
                    <caption>Lista de Roles associadas ao perfil</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EXCLUIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profile->roles()->paginate(10) as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                <button btn-delete-role class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $profile->roles()->paginate(10)->links()}}
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('profiles.index') }}" title="Listar perfis" aria-label="Listar perfis"><i class="fa-solid fa-list"></i></a>
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('profiles.edit', $profile->id) }}" title="Editar perfil" aria-label="Editar perfil"><i class="fa-solid fa-edit"></i></a>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('deleteRole.js') }}" type="module"></script>
@endpush

@endsection
