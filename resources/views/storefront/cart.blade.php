@php
    $html_tag_data = [];
    $title = 'Cart';
    $description = 'Ecommerce Cart Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/input-spinner.min.js"></script>
@endsection

@section('js_page')
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
                            <span class="text-small align-middle">Storefront</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <div class="col-12 col-lg order-1 order-lg-0">
                <!-- Items Start -->
                <h2 class="small-title">Items</h2>
                <div class="mb-5">
                    @foreach ($cartItems as $item)
                        <div class="card mb-2">
                            <div class="row g-0 sh-18 sh-md-14">
                                <div class="col-auto">
                                    <img src="/img/product/small/product-1.webp"
                                        class="card-img card-img-horizontal h-100 sw-9 sw-sm-13 sw-md-15" alt="thumb" />
                                </div>
                                <div class="col position-relative h-100">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex align-items-center">
                                                <div class="pt-0 pb-0 pe-2">
                                                    <div class="h6 mb-0 clamp-line" data-line="1">{{ $item->name }} Tamanho <span class="badge badge-pill badge-danger"> {{$item->attributes->size}}</span></div>
                                                    <div class="text-muted text-small">{{ $item->name }}</div>
                                                    <div class="mb-0 sw-19">$ {{ $item->price }}</div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-3 pe-0 d-flex align-items-center">
                                                <form action="{{ route('cart.update') }}" class="row g-3" method="POST"
                                                    id="cartUpdate">
                                                    @csrf
                                                    <div class="col-auto">
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                    </div>
                                                    <div class="input-group spinner sw-11" data-trigger="spinner">
                                                        <div class="col-auto">
                                                            <select class="form-control" name="quantity" id='quantity'>
                                                                @for ($i = 1; $i <= $item->attributes->quantity_available; $i++)
                                                                    @if ($item->quantity == $i)
                                                                        <option value="{{ $i }}" selected>
                                                                            {{ $i }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        {{-- <div class="input-group-text">
                                                            <button type="button"
                                                                class="spin-down single px-2 d-flex justify-content-center"
                                                                data-spin="down">-</button>
                                                        </div>
                                                        <input type="text" class="form-control text-center px-0"
                                                            value="{{ $item->quantity }}"
                                                            data-rule-max="{{ $item->attributes->quantity_available }}"
                                                            data-rule="quantity" id="quantity" name="quantity" />
                                                        <div class="input-group-text">
                                                            <button type="button"
                                                                class="spin-up single px-2 d-flex justify-content-center"
                                                                data-spin="up">+</button>
                                                        </div> --}}
                                                    </div>
                                                </form>
                                            </div>
                                            <div
                                                class="col-6 col-md-3 d-flex justify-content-end justify-content-md-start align-items-center">
                                                <div class="h6 mb-0">$ {{ $item->quantity * $item->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('cart.remove') }}" method="POST" class="mt-4">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button
                                            class="btn btn-sm btn-icon btn-icon-only btn btn-foreground-alternate position-absolute t-2 e-2 "
                                            ty> <i data-acorn-icon="error-hexagon"></i><span
                                                class="position-absolute b-2 e-4 ">remover</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Items End -->
            </div>

            <div class="col-12 col-lg-auto order-0 order-lg-1">
                <!-- Summary Start -->
                <h2 class="small-title">Resumo</h2>
                <div class="card mb-5 w-100 sw-lg-35">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">ITEMS</p>
                                <p>
                                    <span class="text-alternate">{{ count($cartItems) }}</span>
                                </p>
                            </div>
                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">TOTAL</p>
                                <div class="cta-2">
                                    <span>
                                        <span class="text-small text-muted cta-2">$</span>
                                        {{ Cart::getTotal() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <form class="mb-4" action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-icon-end btn-danger w-100">Remover todos os
                                itens</button>
                        </form>
                        <button class="btn btn-icon btn-icon-end btn-primary w-100" type="button">
                            <span>Finalizar</span>
                            <i data-acorn-icon="chevron-right"></i>
                        </button>
                    </div>
                </div>
                <!-- Summary End -->
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
