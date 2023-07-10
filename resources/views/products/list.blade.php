@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product)
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
                                    <p class="card-text"><input type="hidden" value="{{ $product->id }}" name="id">
                                    </p>
                                    <p class="card-text">{{ $product->name }}<input type="hidden"
                                            value="{{ $product->name }}" name="name"></p>
                                    <p class="card-text">{{ $product->price }}<input type="hidden"
                                            value="{{ $product->price }}" name="price"></p>
                                    <input type="hidden" value="1" name="quantity">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <a class="nav-link" href="{{ route('products.list.variation', $product->id)}}">Visualizar Produtos</a>
                                            </button>
                                        </div>
                                        <small class="text-body-secondary">9 mins</small>
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
