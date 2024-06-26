@extends('templates.layout')

@section('content')

    @include('templates.subviews.validation')


    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-sm rounded-0"  id="email" name="email" value="{{ old('email') ?? '' }}" required placeholder="digite seu email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm rounded-0"  id="password" name="password" value="{{ old('password') ?? '' }}" required placeholder="digite sua senha">
                    </div>
                    <button class="btn btn-sm btn-primary rounded-0"> Acessar</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('password.request') }}" class="btn btn-sm btn-secondary rounded-0">Esqueceu-se da senha <i class="fa-solid fa-circle-question"></i></a>
            </div>
        </div>
    </div>

@endsection
