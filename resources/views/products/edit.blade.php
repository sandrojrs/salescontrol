@extends('layouts.app')


@section('content')
<div class="row">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Ocorreram alguns problemas com o input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($product, ['method' => 'PATCH', 'files' => true, 'route' => ['products.update', $product->id]]) !!}
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
            {!! Form::text('link', null, array('placeholder' => 'Link','class' => 'form-control', 'value'=> $product->link )) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fotos:</strong>
            {!! Form::file('fotos[]', ['multiple' => true]) !!}
        </div>
    </div><br/><br/>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            @if(!empty($product->productPhoto))
                @foreach($product->productPhoto as $photo)
                <div style="display:flex; margin-top:5px">
                    <img src="{{ asset($photo->photoUrl) }}" alt="Foto" /> 
                    <a class="btn btn-danger btn-small" onclick="removerFoto({{$photo->id}})" style="height: 5%;margin-left:5px">remover</a>
                </div>                
                @endforeach
            @endif
        </div>
 
    </div>

    
    <div class="row m-2" id="original" style="display:none">
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
                <a class="btn btn-primary adicionar"  style="margin-top:20px">+</a>
                <div class="botao_excluir"></div>
            </div>
        </div>
    </div>
   
    @if(!empty($product->productSpecification))
                @foreach($product->productSpecification as $specification)                       
          
        <div class="row m-2">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Quantidade:</strong>
                    {!! Form::number('quantity[]', $specification->quantity, array('disabled' => true,'placeholder' => 'Quantidade','class' => 'form-control' )) !!}
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Tamanho:</strong>
                    {!! Form::text('size[]', $specification->size, array('disabled' => true,'placeholder' => 'Tamanho','class' => 'form-control')) !!}
                </div>
            </div>
        </div>

    @endforeach
            @endif
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                <a class="btn btn-primary adicionar"  style="margin-top:20px">+ Adicionar</a>
                </div>
            </div>
            <div id="original_clonados"></div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center m-4">
        <button type="submit" class="btn btn-primary btn-small">Salvar</button>
    </div>
</div>
{!! Form::close() !!}

@endsection

@vite(['resources/js/app.js']);

<script type="module">
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".adicionar").click(function() {
    // Clonar a div com o ID "original"
    var clone = $("#original").clone();

    clone.removeAttr('id');
    
    clone.css('display', '');
    var clonedInput = clone.find('input');
    clonedInput.prop('required', true);
    clone.insertAfter("#original_clonados");

    // Adicionar um botão para remover o elemento clonado
    var removeButton = $('<a class="btn btn-danger" style="margin-top:20px;margin-left:5px;">x</a>');
        removeButton.click(function() {
          clone.remove();
        });
        clone.find('.botao_excluir').append(removeButton);
    });

    function removerDiv(elemento) {
      elemento.remove();
    }

    
});
</script>

<script>


function removerFoto(idFoto) {

    var url = window.location;

    $.ajax({   
    type: "POST",
    data : {'id':idFoto},
    url: url.origin+"/products/"+idFoto+"/removerImagem",   
    success: function(data){
        $(window).prop("location", location.href);                   
    }   
    });   
    return false;
    }
</script>