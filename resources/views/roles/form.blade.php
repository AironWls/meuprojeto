<form action="{{ $action }}" method="POST">
    @csrf
    @if ($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <select name="name[]" id="name" class="form-select form-select-sm rounded-0" required multiple>
            <option value="">Selecione</option>
            @foreach ($routeCollection as $route)
                @if (!is_null($route->getName()))
                    <option value="{{ $route->getName() }}">{{ $route->getName() }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-sm btn-primary rounded-0"> Salvar <i class="fa-solid fa-floppy"></i></button>
</form>
