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
                                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off"
                                    action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="mb-2 w-100">
                                            <label class="text-muted" for="password">Senha</label>
                                            @if (Route::has('password.request'))
                                                <a class="float-end" href="{{ route('password.request') }}">
                                                    {{ __('Esqueci a senha!') }}
                                                </a>
                                            @endif
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label">Relembre-me</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary ms-auto">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    Não tem uma conta ? <a class="text-dark"
                                        href="{{ route('register') }}">{{ __('Registrar') }}</a>
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
