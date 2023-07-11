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
                                    <h2>Perfil</h2>
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
                                {!! Form::model($profile, ['method' => 'PATCH','route' => ['profile.update', $profile->id]]) !!}
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Cep</label>
                                    {!! Form::text('zip_code', $profile->zip_code, [
                                        'placeholder' => 'Cep',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Estado</label>
                                    {!! Form::text('uf', $profile->uf, [
                                        'placeholder' => 'Estado',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Cidade</label>
                                    {!! Form::text('city', $profile->city, [
                                        'placeholder' => 'Cidade',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Endereço</label>
                                    {!! Form::text('address', $profile->address , [
                                        'placeholder' => 'Endereço',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label"><strong>Numero:</strong></label>
                                    {!! Form::text('number', $profile->number, [
                                        'placeholder' => 'Numero',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label"><strong>Complemento:</strong></label>
                                    {!! Form::text('complement', $profile->complement, [
                                        'placeholder' => 'Complemento',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label"><strong>Telefone:</strong></label>
                                    {!! Form::text('phone', $profile->phone, [
                                        'placeholder' => 'Telefone',
                                        'class' => 'form-control',
                                    ]) !!}
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
