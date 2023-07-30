@php
    $html_tag_data = [];
    $title = 'Checkout';
    $description = 'Ecommerce Checkout Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/select2.full.min.js"></script>
    <script src="/js/vendor/timepicker.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/storefront.checkout.js"></script>
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
                            <span class="text-small align-middle">Tela inicial</span>
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
                <h2 class="small-title">Endereço</h2>

                <form id="addressForm" class="tooltip-label-end" novalidate>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nome</label>
                                    <input class="form-control" name="addressFirstName" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Sobrenome</label>
                                    <input class="form-control" name="addressLastName" />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input class="form-control" name="addressPhone" />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <div class="w-100 ">
                                        <label class="form-label">Estado</label>
                                        <select class="select-single-no-search" placeholder='Escolha um tamanho'>
                                            <option label="&nbsp;"></option>
                                            <option value="Fixed Amount">P</option>
                                            <option value="Free Shipping">M</option>
                                            <option value="Percentage">G</option>
                                            <option value="Percentage" selected>GG</option>
                                            <option value="Percentage">EXG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="w-100">
                                        <label class="form-label">Cidade</label>
                                        <select class="select-single-no-search" placeholder='Escolha um tamanho'>
                                            <option label="&nbsp;"></option>
                                            <option value="Fixed Amount">P</option>
                                            <option value="Free Shipping">M</option>
                                            <option value="Percentage">G</option>
                                            <option value="Percentage" selected>GG</option>
                                            <option value="Percentage">EXG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">codigo Postal</label>
                                    <input class="form-control" name="addressZipCode" />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Detalhes</label>
                                    <textarea class="form-control" rows="3" name="addressDetail"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-auto order-0 order-lg-1">
                <!-- Summary Start -->
                <h2 class="small-title">Resumo</h2>
                <div class="card mb-5 w-100 sw-lg-35">
                    <div class="card-body mb-n5">
                        <div class="mb-3">
                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">ITEMS</p>
                                <p>
                                    <span class="text-alternate">5</span>
                                </p>
                            </div>
                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">TOTAL</p>
                                <p>
                                    <span class="text-alternate">
                                        <span class="text-small text-muted">$</span>
                                        285.25
                                    </span>
                                </p>
                            </div>

                            <div class="mb-2">
                                <p class="text-small text-muted mb-1">TOTAL</p>
                                <div class="cta-2">
                                    <span>
                                        <span class="text-small text-muted cta-2">$</span>
                                        321.50
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="customCheck1" />
                            <label class="form-check-label" for="customCheck1">
                                Eu li e aceito o
                                <a href="#" target="_blank">termos e Condições.
                                </a>
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column flex-sm-row justify-content-between mb-5 w-100">
                                <button class="btn btn-icon btn-icon-end btn-primary w-100" type="button">
                                    <span>Finalizar</span>
                                    <i data-acorn-icon="chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summary End -->
            </div>
        </div>
    </div>
@endsection
<script>
    jQuery('.select-single-no-search').select2({minimumResultsForSearch: Infinity, placeholder: ''});
</script>
