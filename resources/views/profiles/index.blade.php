@extends('templates.layout')

@section('content')

    @include('templates.subviews.message')

    @include('templates.subviews.form-search', ['action' => route('profiles.index')])

    @include('templates.subviews.form-action')

    @include('templates.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Listar'])

    <div class="container">
        <div class="table-responsive">
            <table class="table table-sm table-borderless table-hover table-striped">
                <caption>Lista de Perfis</caption>
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" class="form-check-input rounded-0" data-checkbox-toggle></th>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>STATUS</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td><input type="checkbox" class="form-check-input rounded-0"
                                    data-checkboxes-id={{ $item->id }}></td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->status)
                                    <button aria-label='Ativo' data-button-status title="Ativo" class="btn btn-sm btn-success rounded-0"><i
                                            class="fa-solid fa-thumbs-up"></i></button>
                                @else
                                    <button aria-label='Inativo' data-button-status title="Inativo" class="btn btn-sm btn-warning rounded-0"><i
                                            class="fa-solid fa-thumbs-down"></i></button>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Ações">
                                    {{-- <a href="{{ route('profiles.add_role_to_profile', $item->id) }}" title="Adicionar Role ao perfil" type="button" class="btn btn-dark rounded-0"><i class="fa-solid fa-gear"></i></a> --}}
                                    <a href="{{ route('profiles.show', $item->id) }}" title="Visualizar perfil" type="button" class="btn btn-info rounded-0"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('profiles.edit', $item->id) }}" title="Editar perfil" type="button" class="btn btn-secondary rounded-0"><i class="fa-solid fa-edit"></i></a>
                                    <button data-button-delete title="Excluir perfil" type="button" class="btn btn-danger rounded-0"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        {{ $list->links() }}
    </div>

    <div class="container">
        <a title="adicionar Perfil" aria-label="adicionar Perfil" href="{{ route('profiles.create')}}" class="btn btn-sm btn-primary rounded-0"> Adicionar <i class="fa-solid fa-plus"></i></a>
    </div>

    @push('scripts')
        <script src="{{ asset('checkboxToggle.js') }}"></script>
        <script src="{{ asset('action.js')}}" type="module"></script>
        <script src="{{ asset('delete.js') }}" type="module"></script>
        <script src="{{ asset('status.js') }}" type="module"></script>
    @endpush
@endsection
