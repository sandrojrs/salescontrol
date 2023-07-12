@extends('layouts.app')

@section('content')
    <div class="card">

        {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif --}}

        <div class="card-header">
            Carrinho de compra
            <form action="{{ route('orderProducts.store') }}" method="POST">
                @csrf
                <button class="btn btn-success" type="submit">Finalizar compra</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="align-text-center">
                        <th scope="col">img produto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                </a>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td><span class="badge text-bg-primary">{{ $item->attributes->size }}</span></td>

                            <td>
                                <form action="{{ route('cart.update') }}" class="row g-3" method="POST" id="cartUpdate">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="quantity" id='quantity'>
                                            @for ($i = 1; $i <= $item->attributes->quantity_available; $i++)
                                                @if ($item->quantity == $i)
                                                    <option value="{{ $i }}" selected>{{ $i }}
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </form>
                            </td>

                            <td>${{ $item->price }}</td>
                            <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="btn btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-transparent">
            <div class="card-body">
                Total: ${{ Cart::getTotal() }}
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Remover todos os itens</button>
                </form>
            </div>
        </div>
    </div>
    <script type="module">
        $("#quantity").change(function(){
            console.log('teste');
            if ($(this).val()) {
                $("#cartUpdate").submit();
            }
        })
    </script>
@endsection
