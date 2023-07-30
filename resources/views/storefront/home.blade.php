@php
    $html_tag_data = [];
    $title = 'Storefront';
    $description = 'Ecommerce Product Home Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/movecontent.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/storefront.home.js"></script>
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

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-center justify-content-end">
                    <!-- Categories Button For Small Screens Start -->
                    <button type="button" class="btn btn-icon btn-outline-primary d-inline-block d-xl-none w-100 w-md-auto"
                        data-bs-toggle="modal" data-bs-target="#menuModal">
                        <span>Categorias</span>
                        <i data-acorn-icon="more-horizontal"></i>
                    </button>
                    <!-- Categories Button For Small Screens End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-3 d-none d-xl-block mb-5 card bg">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between" id="menuColumn">
                        <!-- Content of this will be moved from #categoryMenuMoveContent div based on the responsive breakpoint.  -->
                    </div>
                </div>
            </div>
            <!-- Left Side End -->

            <!-- Right Side Cta Banners Start -->
            <div class="col-12 col-xl-9 mb-5">
                <div class="row g-2 mb-2">
                    <div class="col-12 col-sm-6 col-md-8">
                        <div class="card sh-30 sh-sm-45 hover-img-scale-up">
                            <img src="/img/banner/cta-standard-1.webp" class="card-img h-100 scale" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-1 mb-3 text-black w-md-100 w-75">Wall Shelf Ideas to Transform Your
                                        Space</div>
                                    <div class="w-50 text-black d-none d-md-block">
                                        Lollipop chocolate marzipan marshmallow gummi bears. Tootsie roll liquorice cake
                                        jelly beans.
                                    </div>
                                </div>
                                <div>
                                    <a href="/Storefront/Filters"
                                        class="btn btn-icon btn-icon-start btn-outline-primary mt-3 stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card sh-30 sh-sm-45 hover-img-scale-up">
                            <img src="/img/banner/cta-vertical-3.webp" class="card-img h-100 scale" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-1 mb-5 text-black w-md-100 w-75">Sale on Notebooks and Sketchbooks</div>
                                </div>
                                <div>
                                    <a href="/Storefront/Filters"
                                        class="btn btn-icon btn-icon-start btn-outline-primary mt-3 stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 col-sm-6">
                        <div class="card sh-22 sh-xl-19 hover-img-scale-up">
                            <span class="badge rounded-pill bg-primary me-1 position-absolute e-2 t-2 z-index-1">SALE</span>
                            <img src="/img/banner/cta-horizontal-short-1.webp" class="card-img h-100 scale"
                                alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-3 mb-2 text-black w-75">10% Discount for Canned Products</div>
                                </div>
                                <div>
                                    <a href="/Storefront/Filters"
                                        class="btn btn-icon btn-icon-start btn-outline-primary stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>Buy Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card sh-22 sh-xl-19 hover-img-scale-up">
                            <span class="badge rounded-pill bg-primary me-1 position-absolute e-2 t-2 z-index-1">SALE</span>
                            <img src="/img/banner/cta-horizontal-short-2.webp" class="card-img h-100 scale"
                                alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-3 mb-2 text-black w-75">20% Discount for Bagged Products</div>
                                </div>
                                <div>
                                    <a href="/Storefront/Filters"
                                        class="btn btn-icon btn-icon-start btn-outline-primary stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>Buy Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side Cta Banners End -->
        </div>

        <!-- Trending Start -->
        <h2 class="small-title">Tendência</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-2 mb-5">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card h-100">
                        <span class="badge rounded-pill bg-primary me-1 position-absolute s-n2 t-2 z-index-1">SALE</span>
                        <img src="/img/product/small/product-1.webp" class="card-img-top sh-22" alt="card image" />
                        <div class="card-body pb-2">
                            <div class="h6 mb-0 d-flex">
                                <a href="/Storefront/Detail" class="body-link d-block lh-1-25 stretched-link">
                                    <span class="clamp-line sh-4" data-line="2">Wooden Animal Toys</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <div class="mb-2">
                                <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true"
                                        data-initial-rating="5">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="text-muted d-inline-block text-small align-text-top">(5)</div>
                            </div>
                            <div class="card-text mb-0">
                                <div class="text-muted text-overline text-small sh-2">
                                    <del>$ 14.25</del>
                                </div>
                                <div>$ 8.50</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Trending End -->
    </div>

    <!-- Category Modal Start -->
    <div class="modal modal-right fade" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Categorias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content of below will be moved to #menuColumn or back in here based on the data-move-breakpoint attribute below -->
                    <div id="categoryMenuMoveContent" data-move-target="#menuColumn" data-move-breakpoint="xl">
                        @forelse ($categories as $category)
                            <a class="nav-link body-link px-0 py-2"
                                href="{{ route('product-category', $category->id) }}">
                                <span class="align-middle">{{ $category->name }}</span>
                                <span class="align-middle">{{ '(' . count($category->products) . ')' }}</span>
                                <i data-acorn-icon="chevron-right" class="align-middle float-end mb-1"
                                    data-acorn-size="13"></i>
                            </a>
                        @empty
                            <span class="align-middle">Nenhuma categoria encontrada</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Modal End -->
@endsection
