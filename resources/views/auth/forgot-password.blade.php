@extends('templates.layout')

@section('content')

@include('templates.subviews.validations')

<div class="container">
    <div class="card rounded-0">
        <div class="card-header">
            Redefinir sua senha
        </div>
        <div class="card-body">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control form-control-sm rounded-0 " id="email" name="email" placeholder="digite seu e-mail" required value="{{ old('email') }}">
                </div>
                <button class="btn btn-sm btn-primary rounded-0">Enviar E-mail <i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{ route('login') }}" class="btn btn-sm btn-secondary rounded-0">Login <i class="fa-solid fa-right-to-bracket"></i></a>
        </div>
    </div>
</div>

@endsection
