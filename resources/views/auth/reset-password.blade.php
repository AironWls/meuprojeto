@extends('templates.layout')

@section('content')

@include('templates.subviews.validation')

<div class="container">
    <div class="card">
        <div class="card-header">Redefinir sua senha</div>
        <div class="card-body">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" id="token" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control form-control-sm rounded-0" id="email" name="email" required value="{{ old('email') ?? ''}}" placeholder="digite seu email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control form-control-sm rounded-0" id="password" name="password" required value="{{ old('password') ?? ''}}" placeholder="digite sua senha">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Repita a senha</label>
                    <input type="password" class="form-control form-control-sm rounded-0" id="password_confirmation" name="password_confirmation" required placeholder="confirme sua senha">
                </div>
                <button class="btn btn-sm btn-primary rounded-0">Redefinir</button>
            </form>
        </div>
        <div class="card-footer"><a href="{{ route('login') }}" class="btn btn-sm btn-secondary rounded-0"> Login</a></div>
    </div>
</div>

@endsection
