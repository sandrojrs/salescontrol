@php
    $html_tag_data = [];
    $title = 'Cart';
    $description = 'Carrinho de compras';
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
                            <span class="text-small align-middle">Inicio</span>
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
                    @if (count($cartItems) == 0)
                        @php $disabled = 'disabled' @endphp
                        <div class="card mb-2">
                            <div class="col position-relative h-100">
                                <div class="card-body">
                                    <div class="row h-100">
                                        <span> Nenhum produto adicionado </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($cartItems as $item)
                        <div class="card mb-2">
                            <div class="row g-0 sh-18 sh-md-14">
                                <div class="col-auto">
                                    <img src="{{ $item->attributes->image }}"
                                        class="card-img card-img-horizontal h-100 sw-9 sw-sm-13 sw-md-15" alt="thumb" />
                                </div>
                                <div class="col position-relative h-100">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex align-items-center">
                                                <div class="pt-0 pb-0 pe-2">
                                                    <div class="h6 mb-0 clamp-line" data-line="1">Aromatic Green Candle
                                                    </div>
                                                    <div class="text-muted text-small">Oakland</div>
                                                    <div class="mb-0 sw-19">$ 15.75</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex align-items-center">
                                                <div class="pt-0 pb-0 pe-2">
                                                    <div class="h6 mb-0 clamp-line" data-line="1">Aromatic Green Candle
                                                    </div>
                                                    <div class="text-muted text-small">Oakland</div>
                                                    <div class="mb-0 sw-19">$ 15.75</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 pe-0 d-flex align-items-center">
                                                <div class="input-group spinner sw-11" data-trigger="spinner">
                                                    <div class="input-group-text">
                                                        <button type="button"
                                                            class="spin-down single px-2 d-flex justify-content-center"
                                                            data-spin="down">-</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center px-0"
                                                        value="1" data-rule="quantity" />
                                                    <div class="input-group-text">
                                                        <button type="button"
                                                            class="spin-up single px-2 d-flex justify-content-center"
                                                            data-spin="up">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-6 col-md-3 d-flex justify-content-end justify-content-md-start align-items-center">
                                                <div class="h6 mb-0">$ 15.75</div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-sm btn-icon btn-icon-only btn btn-danger position-absolute t-2 e-2 "
                                        type="button">
                                        <i data-acorn-icon="error-hexagon"></i>
                                    </button>
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
                                    @if (count($cartItems) == 0)
                                        <span class="text-alternate">0</span>
                                    @else
                                        <span class="text-alternate">5</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">TOTAL</p>
                                <div class="cta-2">
                                    <span>
                                        <span class="text-small text-muted cta-2">$</span>
                                        @if (count($cartItems) == 0)
                                            0
                                        @else
                                            10
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-icon btn-icon-end btn-primary w-100 {{ $disabled }}" type="button">
                            <span>Finalizar</span>
                            <i data-acorn-icon="chevron-right"></i>
                        </button>
                    </div>
                </div>
                <!-- Summary End -->
            </div>
        </div>
    </div>
@endsection
