@php
    $html_tag_data = [];
    $title = 'Categories';
    $description = 'Ecommerce Product Category Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/storefront.categories.js"></script>
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
                            <span class="text-small align-middle">Inicio</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $product->name }}</h1>
                    </div>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Discover Start -->
        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-3 mb-5">
            @foreach ($productVariation as $variation)
                <div class="col">
                    <div class="card">
                        <div class="row g-0 sh-25 sh-sm-25">
                            <div class="col-auto h-100 position-relative">
                                <img src="/img/product/small/product-1.webp" alt="alternate text"
                                    class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                            </div>
                            <div class="col p-0">
                                <div class="card-body d-flex align-items-center h-100 py-3">
                                    <div class="mb-0 h8">
                                        <div>
                                            <div class="clamp-line sh-3 lh-1-5" data-line="1">{{ $variation->name }}</div>
                                        </div>
                                        <div class="card-text mb-2">
                                            <div>$ {{ $variation->price }}</div>
                                        </div>
                                        <div class="card-text mb-2">
                                            <div>Tamanho : <span
                                                    class="badge rounded-pill bg-primary ">{{ $variation->size }}</span>
                                            </div>
                                        </div>
                                        <p class="card-text">Quantidade disponivel :
                                            {{ $variation->quantity_available }}<input type="hidden"
                                                value="{{ $variation->quantity_available }}" name="quantity_available"></p>
                                        <a href="{{ route('product-details', $variation->id) }}" type="button"
                                            class="btn btn-sm btn-primary">
                                            Comprar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Discover End -->
    </div>
@endsection
