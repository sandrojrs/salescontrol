@extends('layouts.app')

@section('content')
    <div class="album py-2 bg-body-tertiary">
        <div class="container">
            <div class="alert alert-dark" role="alert">
                {{ $productVariation[0]->name }}
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($productVariation as $variation)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                    fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <img src="" alt="" class="w-full max-h-60">
                            <div class="card-body">
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-text"><input type="hidden" value="{{ $variation->id }}" name="id">
                                    </p>
                                    <p class="card-text">{{ $variation->name }}<input type="hidden"
                                            value="{{ $variation->name }}" name="name"></p>
                                    <p class="card-text"> tamanho <span
                                            class="badge text-bg-success">{{ $variation->size }}</span></p>
                                    <p class="card-text">R$:{{ $variation->price }}<input type="hidden"
                                            value="{{ $variation->price }}" name="price"></p>

                                    <p class="card-text">Quantidade disponivel : {{ $variation->quantity_available }}<input
                                            type="hidden" value="{{ $variation->quantity_available }}"
                                            name="quantity_available"></p>

                                    <input type="hidden" value="1" name="quantity">
                                    <input type="hidden" value="{{ $variation->id }}" name="product_specifications_id">
                                    <input type="hidden" value="{{ $variation->size }}" name="size">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary {{$variation->quantity_available == 0 ? 'disabled': null}}">
                                                {{$variation->quantity_available == 0 ? 'Produto sem estoque': 'Adicionar ao carrinho'}} </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
