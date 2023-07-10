@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Criar novo Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
        </div>
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



{!! Form::open(array('route' => 'products.store','method'=>'POST', 'files' => true)) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preço:</strong>
            {!! Form::number('price', null, array('placeholder' => 'Preço','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Link:</strong>
            {!! Form::text('link', null, array('placeholder' => 'Link','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descrição:</strong>
            {!! Form::text('description', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fotos:</strong>
            {!! Form::file('fotos[]', ['multiple' => true, 'class'=> 'form-control form-control-sm']) !!}
        </div>
    </div><br/><br/>

    <div class="row" id="original">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Quantidade:</strong>
                {!! Form::number('quantity[]', null, array('placeholder' => 'Quantidade','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Tamanho:</strong>
                {!! Form::text('size[]', null, array('placeholder' => 'Tamanho','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div style="display:flex">
                <a class="btn btn-primary adicionar" id="btn-clone" style="margin-top:20px">+</a>
                <div class="botao_excluir"></div>
            </div>
        </div>
    </div>
    


    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:20px">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
{!! Form::close() !!}


@endsection

@vite(['resources/js/app.js']);

<script type="module">
$(document).ready(function() {
    $("#btn-clone").click(function() {
    // Clonar a div com o ID "original"
    var clone = $("#original").clone();
    
    // Inserir o elemento clonado após a div original
    clone.find(".adicionar").hide();
    clone.insertAfter("#original");

    // Adicionar um botão para remover o elemento clonado
    var removeButton = $('<a class="btn btn-danger" style="margin-top:20px;margin-left:5px;">x</a>');
        removeButton.click(function() {
          clone.remove();
        });
        clone.find('.botao_excluir').append(removeButton);
    });
});
</script>