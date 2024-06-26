<form action="{{ $action }}" method="POST">
    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control form-control-sm" placeholder="nome" id="name" name="name" value="{{ old('name') ?? $profile->name ?? ''}}">
    </div>
    <button class="btn btn-sm btn-primary rounded-0"> Salvar <i class="fa-solid fa-floppy"></i></button>
</form>
