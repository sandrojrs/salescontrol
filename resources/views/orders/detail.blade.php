@php
    $html_tag_data = [];
    $title = 'Detalhes do pedido';
    $description = 'Ecommerce Order Detail Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
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
                            <span class="text-small align-middle">Pedidos</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-3" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
                    <!-- Status Button Start -->
                    <div class="dropdown-as-select w-100 w-md-auto">
                        <button class="btn btn btn-outline-primary w-100 w-md-auto dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Status: Pending</a>
                            <a class="dropdown-item" href="#">Status: Shipped</a>
                            <a class="dropdown-item active" href="#">Status: Delivered</a>
                        </div>
                    </div>
                    <!-- Status Button End -->

                    <!-- Dropdown Button Start -->
                    <div class="ms-1">
                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only" data-bs-offset="0,3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu>
                            <i data-acorn-icon="more-horizontal"></i>
                        </button>
                        {{-- <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" type="button">Edit</button>
                            <button class="dropdown-item" type="button">View Invoice</button>
                            <button class="dropdown-item" type="button">Track Package</button>
                        </div> --}}
                    </div>
                    <!-- Dropdown Button End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
            <div class="col-12 col-xl-8 col-xxl-9 mb-n5">
                <!-- Status Start -->
                <h2 class="small-title">Status</h2>
                <div class="mb-5">
                    <div class="row g-2">
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card sh-13 sh-lg-15 sh-xl-14">
                                <div class="h-100 row g-0 card-body align-items-center py-3">
                                    <div class="col-auto pe-3">
                                        <div
                                            class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="tag" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center lh-1-25">Pedido Id</div>
                                        <div class="text-primary">#{{ $order->id }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card sh-13 sh-lg-15 sh-xl-14">
                                <div class="h-100 row g-0 card-body align-items-center py-3">
                                    <div class="col-auto pe-3">
                                        <div
                                            class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="clipboard" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center lh-1-25">Status do pedido</div>
                                        <div class="text-primary">{{ $order->state }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card sh-13 sh-lg-15 sh-xl-14">
                                <div class="h-100 row g-0 card-body align-items-center py-3">
                                    <div class="col-auto pe-3">
                                        <div
                                            class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="calendar" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center lh-1-25">Previsão de entrega</div>
                                        <div class="text-primary">{{ $order->delivery }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card sh-13 sh-lg-15 sh-xl-14">
                                <div class="h-100 row g-0 card-body align-items-center py-3">
                                    <div class="col-auto pe-3">
                                        <div
                                            class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="shipping" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center lh-1-25">Codigo de envio</div>
                                        <div class="text-primary">{{ $order->tracking_code }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Status End -->

                <!-- Cart Start -->
                <h2 class="small-title">Produtos</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    @php $total = 0 @endphp
                                    @foreach ($order->orders as $product)
                                        <div class="row g-0 sh-9 mb-3">
                                            <div class="col-auto">
                                                <img src="/img/product/small/product-1.webp"
                                                    class="card-img rounded-md h-100 sw-13" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="ps-4 pt-0 pb-0 pe-0 h-100">
                                                    <div class="row g-0 h-100 align-items-start align-content-center">
                                                        <div class="col-12 d-flex flex-column mb-2">
                                                            <div>{{$product->variation->product->name}}</div>
                                                            <div class="text-muted text-small">{{$product->variation->product->name}}</div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-column mb-md-0 pt-1">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-6 d-flex flex-row pe-2 align-items-end text-alternate">
                                                                    <span>{{ $product->quantity }}</span>
                                                                    <span class="text-muted ms-1 me-1">x</span>
                                                                    <span>
                                                                        <span class="text-small">$</span>
                                                                        {{ $product->variation->product->price }}
                                                                    </span>
                                                                </div>
                                                                <div
                                                                    class="col-6 d-flex flex-row align-items-end justify-content-end text-alternate">
                                                                    <span>
                                                                        <span class="text-small">$</span>
                                                                        {{ $product->quantity * $product->variation->product->price }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @php $total += $product->quantity * $product->variation->product->price @endphp
                                    @endforeach

                                </div>
                                <div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto ms-auto ps-3 text-muted">Total</div>
                                        <div class="col-auto sw-13 text-end">
                                            <span>
                                                <span class="text-small text-muted">$</span>
                                                {{$total}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart End -->

                <!-- Activity Start -->
                <div class="card mb-5"></div>
                <!-- Activity End -->
            </div>

            <!-- Address Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <h2 class="small-title">Endereço</h2>
                <div class="card mb-5">
                    <div class="card-body mb-n5">
                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">CLIENTE</p>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate align-middle">{{ $order->user->name }}</div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate">{{ $order->user->email }}</div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">ENDEREÇO DE ENTREGA</p>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate align-middle">{{ $order->user->name }}</div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate">{{ $order->user->address }} {{ $order->user->city }}
                                    {{ $order->user->uf }} {{ $order->user->zip_code }}</div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col text-alternate">{{ $order->user->phone }}</div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div>
                                <p class="text-small text-muted mb-2">PAGAMENTO (CREDIT CARD)</p>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="credit-card" class="text-primary"
                                                data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">Pago via Cartão de crédito</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Address End -->
        </div>
    </div>
@endsection
