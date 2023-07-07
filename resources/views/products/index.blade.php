@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lista de Produtos</h2>
        </div>
        <div class="pull-right m-2">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Criar novo produto</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>#</th>
   <th>Nome</th>
   <th>Preço</th>
   <th>Link</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $product)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->link }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Visualizar</a>
       <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection