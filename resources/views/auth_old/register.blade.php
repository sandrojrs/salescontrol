@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-5">
                            <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo"
                                width="100">
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">{{ __('Register') }}</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off"
                                    action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="name">Nome</label>
                                        <input id="name" type="name" class="form-control" name="name"
                                        value="{{ old('name') }}" autocomplete="name" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="name">Email</label>
                                        <input id="email" type="email" class="form-control" email="email"
                                        value="{{ old('email') }}" autocomplete="email" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="mb-2 text-muted">{{ __('Senha') }}</label>
        
                                        <div class="col-mb">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">
        
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="">{{ __('Confirme a Senha') }}</label>
        
                                        <div class="col-md">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>                                   

                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    já tem uma conta ? <a class="text-dark"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            </div>                            
                        </div>
                        <div class="text-center mt-5 text-muted">
                            Copyright &copy; 2023-2026 &mdash; Céos Tecnologia
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
