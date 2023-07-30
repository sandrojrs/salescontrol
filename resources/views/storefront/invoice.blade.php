@php
    $html_tag_data = [];
    $custom_main_class= 'print-restricted';
    $title = 'Invoice';
    $description= 'Ecommerce Product Invoice Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'custom_main_class'=> $custom_main_class, 'title'=>$title, 'description'=>$description])

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
                            <span class="text-small align-middle">Storefront</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-center justify-content-end">
                    <a onclick="window.print(); return false;" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" href="#">
                        <i data-acorn-icon="print"></i>
                        <span>Print</span>
                    </a>
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Standard Start -->
        <!-- card-print: removes shadow, margin and padding  -->
        <!-- print-me: removes everyting from main .container except the element with the class if main tag has print-restricted class -->
        <h2 class="small-title">Standard</h2>
        <div class="card mb-5 card-print print-me">
            <div class="card-body">
                <div class="row d-flex flex-row align-items-center">
                    <div class="col-12 col-md-6">
                        <img src="/img/logo/logo-blue-light.svg" class="sw-17" alt="logo" />
                    </div>
                    <div class="col-12 col-md-6 text-end">
                        <div class="mb-2">ColoredStrategies Inc</div>
                        <div class="text-small text-muted">4 Glamis Avenue, Strathmore Park, Wellington 6022, New Zealand</div>
                        <div class="text-small text-muted">+6443884455</div>
                    </div>
                </div>
                <div class="separator separator-light mt-5 mb-5"></div>
                <div class="row g-1 mb-5">
                    <div class="col-12 col-md-8">
                        <div class="py-3">
                            <div>Blaine Cottrell</div>
                            <div>55 Esk Street, Invercargill 9810, New Zealand</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="py-3 text-md-end">
                            <div>Invoice #: 741</div>
                            <div>02.02.2019</div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row mb-4 d-none d-sm-flex">
                        <div class="col-6">
                            <p class="mb-0 text-small text-muted">ITEM NAME</p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0 text-small text-muted">COUNT</p>
                        </div>
                        <div class="col-3 text-end">
                            <p class="mb-0 text-small text-muted">PRICE</p>
                        </div>
                    </div>

                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Wooden Animal Toys</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">3 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 14.82</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Aromatic Green Candle</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 8.97</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Good Glass Teapot</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 18.24</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Modern Dark Pot</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 4.24</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Wood Handle Hunter Knife</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">3 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 6.27</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Wireless On-Ear Headphones</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 10.97</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">White Coffee Mug</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 21.24</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Geometric Chandelier</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">3 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 42.15</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">XBox Controller</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">1 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 11.15</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Health and Fitness Smartwatch</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 35.25</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Yeast Karavai</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">5 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 63.75</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Bammy</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 13.25</p>
                        </div>
                    </div>
                    <div class="row mb-4 mb-sm-2">
                        <div class="col-12 col-sm-6">
                            <h6 class="mb-0">Buccellato di Lucca</h6>
                        </div>
                        <div class="col-12 col-sm-3">
                            <p class="mb-0 text-alternate">2 pcs</p>
                        </div>
                        <div class="col-12 col-sm-3 text-sm-end">
                            <p class="mb-0 text-alternate">$ 19.50</p>
                        </div>
                    </div>
                </div>

                <div class="separator separator-light mt-5 mb-5"></div>

                <div class="row">
                    <div class="col text-sm-end text-muted">
                        <div>Subtotal :</div>
                        <div>Tax :</div>
                        <div>Shipping :</div>
                        <div>Total :</div>
                    </div>
                    <div class="col-auto text-end">
                        <div>$ 61.82</div>
                        <div>$ 2.18</div>
                        <div>$ 3.21</div>
                        <div>$ 68.14</div>
                    </div>
                </div>

                <div class="separator separator-light"></div>

                <div class="text-small text-muted text-center">Invoice was created on a computer and is valid without the signature and seal.</div>
            </div>
        </div>
        <!-- Standard End -->
    </div>
@endsection
