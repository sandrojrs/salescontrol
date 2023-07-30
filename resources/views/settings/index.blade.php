@php
    $html_tag_data = [];
    $title = 'Settings';
    $description = 'Ecommerce Settings Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

<style>
    .disable-div {
        pointer-events: none;
    }
</style>

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row g-0">
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

        <!-- Settings List Start -->
        <div class="row row-cols-1 row-cols-md-2 g-2">
            <div class="col disable-div">
                <a href="/Settings/General" class="card hover-border-primary h-100 disabled">
                    <div class="card-body row g-0">
                        <div class="col-auto">
                            <div
                                class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="building" class="text-primary"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column ps-card justify-content-start">
                                <div class="d-flex flex-column justify-content-center mb-2">
                                    <div class="heading text-primary mb-0">Organização (Em breve)</div>
                                </div>
                                <div class="text-alternate">
                                    Dados da organização
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/Settings/General" class="card hover-border-primary h-100">
                    <div class="card-body row g-0">
                        <div class="col-auto">
                            <div
                                class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="folders" class="text-primary"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column ps-card justify-content-start">
                                <div class="d-flex flex-column justify-content-center mb-2">
                                    <div class="heading text-primary mb-0">Categorias</div>
                                </div>
                                <div class="text-alternate">
                                    Categorias
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col ">
                <a href="/Settings/General" class="card hover-border-primary h-100">
                    <div class="card-body row g-0">
                        <div class="col-auto">
                            <div
                                class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="pin" class="text-primary"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column ps-card justify-content-start">
                                <div class="d-flex flex-column justify-content-center mb-2">
                                    <div class="heading text-primary mb-0">Localização (Em breve)</div>
                                </div>
                                <div class="text-alternate">
                                    Localização
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/Settings/General" class="card hover-border-primary h-100">
                    <div class="card-body row g-0">
                        <div class="col-auto">
                            <div
                                class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="wallet" class="text-primary"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column ps-card justify-content-start">
                                <div class="d-flex flex-column justify-content-center mb-2">
                                    <div class="heading text-primary mb-0">Pagamentos</div>
                                </div>
                                <div class="text-alternate">
                                    Tipos de pagamentos
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Settings List End -->
    </div>
@endsection
