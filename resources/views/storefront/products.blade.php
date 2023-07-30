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
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Discover Start -->
        <h2 class="small-title">{{ $category->name }}</h2>
        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-3 mb-5">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <div class="row g-0 sh-16 sh-sm-17">
                            <div class="col-auto h-100 position-relative">
                                <span
                                    class="badge rounded-pill bg-primary me-1 position-absolute e-n2 t-2 z-index-1">OFERTA</span>
                                <img src="/img/product/small/product-1.webp" alt="alternate text"
                                    class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                            </div>
                            <div class="col p-0">
                                <div class="card-body d-flex align-items-center h-100 py-3">
                                    <div class="mb-0 h6">
                                        <a href="{{ route('product-variation', $product->id) }}" class="body-link stretched-link">
                                            <div class="clamp-line sh-3 lh-1-5" data-line="1">{{ $product->name }}</div>
                                        </a>
                                        <div class="card-text mb-2">
                                            <div>$ {{ $product->price }}</div>
                                        </div>                                    
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
