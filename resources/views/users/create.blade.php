@extends('layouts.app')


@section('content')
    <div class="container">
        <section class="h-200">
            <div class="container h-200">
                <div class="row justify-content-sm-center h-200">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="row mb-4 mt-4">
                            <div class="col-lg-12 margin-tb text-center">
                                <div>
                                    <h2>Criar novo usuário</h2>
                                </div>
                                {{-- <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                                </div> --}}
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'row g-3']) !!}
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Nome</label>
                                    {!! Form::text('name', null, ['placeholder' => 'Nome', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    {!! Form::text('name', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Senha</label>
                                    {!! Form::password('password', ['placeholder' => 'Senha', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Confirme a senha</label>
                                    {!! Form::password('confirm-password', ['placeholder' => 'Confirme a senha', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label"><strong>Permisões:</strong></label>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
