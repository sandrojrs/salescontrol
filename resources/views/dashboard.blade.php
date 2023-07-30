@php
    $html_tag_data = [];
    $title = 'Dashboard';
    $description = 'Ecommerce Dashboard';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/pages/dashboard.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <a class="muted-link pb-2 d-inline-block hidden" href="#">
                        <span class="align-middle lh-1 text-small">&nbsp;</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Bem vindo, {{ Auth::user()->name }}!</h1>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Stats Start -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                        <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-haspopup="true">
                            <span class="small-title"></span>
                        </a>
                        <div class="dropdown-menu font-standard">
                            <div class="nav flex-column" role="tablist">
                                <a class="active dropdown-item text-medium" href="#" aria-selected="true"
                                    role="tab">Hoje</a>
                                {{-- <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a> --}}
                            </div>
                        </div>
                    </div>
                    <h2 class="small-title">Estatísticas</h2>
                </div>
                <div class="mb-5">
                    <div class="row g-2">
                        <div class="col-6 col-md-4 col-lg-4">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div
                                        class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="dollar" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">GANHOS
                                    </div>
                                    <div class="text-primary cta-4">$ 315.20</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div
                                        class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="cart" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">PEDIDOS
                                    </div>
                                    <div class="text-primary cta-4">{{ $ordersAmount }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="server" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">SESSIONS</div>
                                    <div class="text-primary cta-4">463</div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-6 col-md-4 col-lg-4">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div
                                        class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="user" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">CLIENTES
                                    </div>
                                    <div class="text-primary cta-4">{{ $customersAmount }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="arrow-top-left" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">RETURNS</div>
                                    <div class="text-primary cta-4">2</div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="message" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">COMMENTS</div>
                                    <div class="text-primary cta-4">5</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Stats End -->

        <div class="row">
            <!-- Recent Orders Start -->
            <div class="col-xl-12 mb-5">
                <h2 class="small-title">Pedidos Recentes</h2>
                <div class="mb-n2 scroll-out">
                    <div class="scroll-by-count" data-count="6">
                        @foreach ($orders as $order)
                            <div class="card mb-2 sh-15 sh-md-6">
                                <div class="card-body pt-0 pb-0 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                            <a href="/Orders/Detail" class="body-link stretched-link">Order
                                                #{{ $order->id }}</a>
                                        </div>
                                        <div
                                            class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                            <span class="badge bg-outline-primary me-1">{{ $order->state }}</span>
                                        </div>
                                        <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                                            <span>
                                                <span class="text-small">$</span>
                                                @php $total = 0 @endphp
                                                @foreach ($order->orders as $products)
                                                    {{ $total }}
                                                    {{-- {{ $total += $products->quantity * $products->quantity }}                                                 --}}
                                                @endforeach
                                            </span>
                                        </div>
                                        <div
                                            class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">
                                            {{ $order->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Recent Orders End -->

            <!-- Performance Start -->
            {{-- <div class="col-xl-6 mb-5">
                <div class="d-flex">
                    <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                        <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-haspopup="true">
                            <span class="small-title"></span>
                        </a>
                        <div class="dropdown-menu font-standard">
                            <div class="nav flex-column" role="tablist">
                                <a class="active dropdown-item text-medium" href="#" aria-selected="true"
                                    role="tab">Hoje</a>
                            </div>
                        </div>
                    </div>
                    <h2 class="small-title">Performance</h2>
                </div>
                <div class="card sh-45 h-xl-100-card">
                    <div class="card-body h-100">
                        <div class="h-100">
                            <canvas id="horizontalTooltipChart"></canvas>
                            <div
                                class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition">
                                <div
                                    class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3">
                                    <span class="icon"></span>
                                </div>
                                <div>
                                    <span
                                        class="text d-flex align-middle text-alternate align-items-center text-small">Bread</span>
                                    <span class="value d-flex align-middle text-body align-items-center cta-4">300</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Performance End -->
        </div>
    </div>
@endsection
