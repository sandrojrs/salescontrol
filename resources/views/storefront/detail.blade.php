@php
    $html_tag_data = [];
    $title = 'Detalhes do produto';
    $description = 'Ecommerce Product Detail Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css" />
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/baguetteBox.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <script src="/js/pages/storefront.detail.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Produtos</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-5" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
                    <!-- Edit Button Start -->
                    {{-- <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                        <i data-acorn-icon="edit-square"></i>
                        <span>Edit</span>
                    </button> --}}
                    <!-- Edit Button End -->

                    <!-- Dropdown Button Start -->
                    {{-- <div class="ms-1">
                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only" data-bs-offset="0,3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-acorn-icon="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" type="button">Move</button>
                            <button class="dropdown-item" type="button">Unpublish</button>
                            <button class="dropdown-item" type="button">Delete</button>
                        </div>
                    </div> --}}
                    <!-- Dropdown Button End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <!-- Product Left Side Start -->
                            <div class="col-12 col-xl-7">
                                <div class="glide glide-gallery" id="glideStorefrontDetail">
                                    <!-- Large Images Start -->
                                    <div class="glide glide-large">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides gallery-glide-custom">
                                                <li class="glide__slide p-0">
                                                    <a href="/img/product/large/product-1.webp">
                                                        <img alt="detail" src="/img/product/large/product-1.webp"
                                                            class="responsive border-0 rounded-md img-fluid mb-3 sh-35 sh-md-45 sh-xl-60 w-100" />
                                                    </a>
                                                </li>
                                                <li class="glide__slide p-0">
                                                    <a href="/img/product/large/product-2.webp">
                                                        <img alt="detail" src="/img/product/large/product-2.webp"
                                                            class="responsive border-0 rounded-md img-fluid mb-3 sh-35 sh-md-45 sh-xl-60 w-100" />
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Large Images End -->
                                    <!-- Thumbs Start -->
                                    <div class="glide glide-thumb">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                <li class="glide__slide p-0">
                                                    <img alt="thumb" src="/img/product/small/product-1.webp"
                                                        class="responsive rounded-md img-fluid" />
                                                </li>
                                                <li class="glide__slide p-0">
                                                    <img alt="thumb" src="/img/product/small/product-2.webp"
                                                        class="responsive rounded-md img-fluid" />
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="glide__arrows" data-glide-el="controls">
                                            <button
                                                class="btn btn-icon btn-icon-only btn-foreground hover-outline left-arrow"
                                                data-glide-dir="<">
                                                <i data-acorn-icon="chevron-left"></i>
                                            </button>
                                            <button
                                                class="btn btn-icon btn-icon-only btn-foreground hover-outline right-arrow"
                                                data-glide-dir=">">
                                                <i data-acorn-icon="chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Thumbs End -->
                                </div>
                            </div>
                            <!-- Product Left Side End -->

                            <!-- Product Right Side Start -->
                            <div class="col-12 col-xl-5 sh-xl-60 d-flex flex-column justify-content-between">
                                <div>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $productsVariation->id }}" name="id">
                                        <input type="hidden"value="{{ $productsVariation->product->name }}" name="name">
                                        <input type="hidden"value="{{ $productsVariation->product->price }}" name="price">
                                        <input type="hidden" value="{{ $quantity }}" name="quantity_available">
                                        <input type="hidden" value="{{ $productsVariation->size }}" name="size">
                                        <a class="mb-1 d-inline-block text-small"
                                            href="#">{{ $productsVariation->product->category->name }}</a>
                                        <h3 class="mb-4">{{ $productsVariation->product->name }}</h3>
                                        <div class="h4">$ 25.20</div>
                                        <p class="mt-2 mb-4 sh-11 clamp-line" data-line="4">
                                            {{ $productsVariation->product->description }}
                                        </p>
                                        <div class="row g-3 mb-4">
                                            <div class="mb-3 col-12 col-sm-auto me-1">
                                                <label class="fw-bold form-label">Tamanho</label>
                                                <div class="pt-1">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="inlineRadio"
                                                            id="inlineRadio1" checked />
                                                        <label class="form-check-label"
                                                            for="inlineRadio1">{{ $productsVariation->size }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-auto">
                                                <label class="fw-bold form-label">Quantidade</label>
                                                <select class="sw-10 select-single-no-search" name="quantity">
                                                    @foreach (range(1, $quantity) as $y)
                                                        <option>{{ $y }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn btn-sm btn-primary {{ $quantity == 0 ? 'disabled' : null }}">
                                                {{ $quantity == 0 ? 'Produto sem estoque' : 'Adicionar ao carrinho' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Product Right Side End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p class="card-text"><input type="hidden" value="{{ $variation->id }}" name="id">
    </p>
    <p class="card-text">{{ $variation->name }}<input type="hidden" value="{{ $variation->name }}"
            name="name"></p>
    <p class="card-text"> tamanho <span class="badge text-bg-success">{{ $variation->size }}</span></p>
    <p class="card-text">R$:{{ $variation->price }}<input type="hidden" value="{{ $variation->price }}"
            name="price"></p>

    <p class="card-text">Quantidade disponivel : {{ $variation->quantity_available }}<input type="hidden"
            value="{{ $variation->quantity_available }}" name="quantity_available"></p>

    <input type="hidden" value="1" name="quantity">
    <input type="hidden" value="{{ $variation->id }}" name="product_specifications_id">
    <input type="hidden" value="{{ $variation->size }}" name="size">

    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="submit"
                class="btn btn-sm btn-outline-secondary {{ $variation->quantity_available == 0 ? 'disabled' : null }}">
                {{ $variation->quantity_available == 0 ? 'Produto sem estoque' : 'Adicionar ao carrinho' }} </button>
        </div>
    </div>
</form> --}}
