@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nome</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
        </div>
    </div>
</div>


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preço:</strong>
            {{ $product->price }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Link:</strong>
            {{ $product->link }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descrição:</strong>
            {{ $product->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
       <h2>Imagens:</h2>
    </div>  
    @if(!empty($product->productPhoto))
        @foreach($product->productPhoto as $photo)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

          <img src="{{ asset($photo->photoUrl) }}" alt="Foto" />
             <!-- <img src="{{ asset('storage/' . $photo->photo) }}" width="100%" /> -->
        
        @endforeach
             </div>
    @endif 

    @if(!empty($product->productSpecification))
                @foreach($product->productSpecification as $specification)                       
          
        <div class="row m-2">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Quantidade:</strong>
                    {{$specification->quantity}}
                 
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Tamanho:</strong>
                    {{$specification->size}}
                </div>
            </div>
        </div>

    @endforeach
    @endif
</div>
@endsection
