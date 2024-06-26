<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($update)
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="profile_id" class="form-label">Perfil</label>
                <select name="profile_id" id="profile_id" class="form-select form-select-sm rounded-0">
                    <option value="">Selecione Perfil</option>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control form-control-sm rounded-0" required placeholder="nome" id="name" name="name" value="{{ old('name') ?? $user->name ?? ''}}">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control form-control-sm rounded-0" required placeholder="email" id="email" name="email" value="{{ old('email') ?? $user->email ?? ''}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control form-control-sm rounded-0" required placeholder="senha" id="password" name="password" value="{{ old('password') ?? $user->password ?? ''}}">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="password" class="form-label">Confirme a Senha</label>
                <input type="password" class="form-control form-control-sm rounded-0" required placeholder="confirme a senha" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="avatar" class="form-label">Avatar</label>
        <input type="file" class="form-control form-control-sm rounded-0" placeholder="confirme a senha" id="avatar" name="avatar">
    </div>
    <button class="btn btn-sm btn-primary rounded-0"> Salvar <i class="fa-solid fa-floppy"></i></button>
</form>
