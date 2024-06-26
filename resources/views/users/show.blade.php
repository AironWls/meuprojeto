@extends('templates.layout')

@section('content')

@include('templates.subviews.breadcrumb', ['model' => "Usuário", 'action' => 'Visualizar'])

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">Visualizar Usuário</div>
        <div class="card-body">
            <div class="mb-1"><img src="{{ asset('storage/avatar-sem-imagem.png') }}" alt="avatar"></div>
            <p><span class="fw-bold">ID:</span> {{ $user->id }}</p>
            <p><span class="fw-bold">Nome:</span> {{ $user->name }}</p>
            <p><span class="fw-bold">E-mail:</span> {{ $user->email }}</p>
            <p><span class="fw-bold">Status:</span> {{ $user->status === 1 ? 'Ativo' : 'Inativo' }}</p>
            <p><span class="fw-bold">Criado em:</span> {{ $user->created_at }}</p>
            <p><span class="fw-bold">Atualizado em:</span> {{ $user->updated_at }}</p>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-borderless">
                    <caption>Lista de Perfis associados</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EXCLUIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->profiles()->paginate(10) as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <button title="excluir perfil" aria-label="excluir perfil" btn-delete-profile class="btn btn-sm btn-danger rounded-0"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('users.index') }}" title="Listar usuários" aria-label="Listar usuários"><i class="fa-solid fa-list"></i></a>
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('users.edit', $user->id) }}" title="Editar usuário" aria-label="Editar usuário"><i class="fa-solid fa-edit"></i></a>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('deleteProfile.js') }}" type="module"></script>
@endpush

@endsection
