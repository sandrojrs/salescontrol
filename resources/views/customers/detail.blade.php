@php
    $html_tag_data = [];
    $title = 'Customer Detail';
    $description = 'Ecommerce Customer Detail Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/tagify.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/tagify.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/customers.detail.js"></script>
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
                            <span class="text-small align-middle">Detalhes de pessoas</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
                    <button type="button"
                        class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                        <i data-acorn-icon="save"></i>
                        <span>Atualizar</span>
                    </button>

                    <!-- Dropdown Button Start -->
                    <div class="ms-1">
                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only" data-bs-offset="0,3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu>
                            <i data-acorn-icon="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" type="button">Editar</button>
                        </div>
                    </div>
                    <!-- Dropdown Button End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
            <!-- Customer Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <h2 class="small-title">Informações</h2>
                <div class="card">
                    <div class="card-body mb-n5">
                        <div class="d-flex align-items-center flex-column">
                            <div class="mb-5 d-flex align-items-center flex-column">
                                <div
                                    class="sw-6 sh-6 mb-3 d-inline-block bg-primary d-flex justify-content-center align-items-center rounded-xl">
                                    <div class="text-white">BC</div>
                                </div>
                                <div class="h5 mb-1">{{ $user->name }}</div>
                                <div class="text-muted">
                                    <i data-acorn-icon="pin" class="text-muted"></i>
                                    <span class="align-middle">{{ $user->city }} {{ $user->state }}</span>
                                </div>
                            </div>  
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100 mb-5">
                                <button type="button" class="btn btn-primary w-100 me-2">Editar</button>
                                <button type="button" class="btn btn-outline-primary w-100 me-2">Bloquear</button>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="credit-card" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Total de compra</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">$ 5,325.55</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="cart" class="text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="boxes" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Total de pedidos</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">17</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div>
                                <p class="text-small text-muted mb-2">ENDEREÇO DE ENTREGA</p>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate align-middle">{{ $user->name }}</div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{ $user->address }} {{ $user->number }}
                                        {{ $user->city }} {{ $user->state }} {{ $user->zipcode }}</div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{ $user->phone }}</div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Customer End -->

            <div class="col-12 col-xl-8 col-xxl-9">
                <!-- Recent Orders Start -->
                <div class="d-flex justify-content-between">
                    <h2 class="small-title">Pedidos Recentes</h2>
                    <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small"
                        type="button">
                        <span class="align-bottom">Ver todos</span>
                        <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
                    </button>
                </div>
                <div class="mb-5">
                    <div class="card mb-2">
                        <div class="row g-0 sh-16 sh-md-8">
                            <div class="col">
                                <div class="card-body pt-0 pb-0 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <div
                                            class="col-6 col-md-3 d-flex flex-column justify-content-center mb-2 mb-md-0 h-md-100">
                                            <div class="text-muted text-small d-md-none">Id</div>
                                            <a href="/Orders/Detail"
                                                class="text-truncate h-100 d-flex align-items-center">1239</a>
                                        </div>
                                        <div class="col-6 col-md-4 d-flex flex-column justify-content-center mb-2 mb-md-0">
                                            <div class="text-muted text-small d-md-none">Price</div>
                                            <div class="text-alternate">
                                                <span>
                                                    <span class="text-small">$</span>
                                                    321.75
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0">
                                            <div class="text-muted text-small d-md-none">Date</div>
                                            <div class="text-alternate">13.09.2020</div>
                                        </div>
                                        <div
                                            class="col-6 col-md-3 d-flex flex-column justify-content-center mb-2 mb-md-0 align-items-md-end">
                                            <div class="text-muted text-small d-md-none">Status</div>
                                            <div class="text-alternate">
                                                <span class="badge rounded-pill bg-outline-secondary">PENDING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Orders End -->
            </div>
        </div>
    </div>
@endsection
