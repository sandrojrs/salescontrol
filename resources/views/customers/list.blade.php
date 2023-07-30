@php
    $html_tag_data = [];
    $title = 'Lista de usuarios';
    $description = 'Ecommerce Customer List Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
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
                <div class="col-3 d-flex align-items-end justify-content-end">
                    <!-- Check Button Start -->
                    <div class="btn-group ms-1 check-all-container">
                        <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" data-target="#checkboxTable">
                            <span class="form-check float-end">
                                <input type="checkbox" class="form-check-input" id="checkAll" />
                            </span>
                        </div>
                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <span class="align-middle d-inline-block">Status</span>
                            </a>                           
                            <a class="dropdown-item" href="#">
                                <span class="align-middle d-inline-block">Apagar</span>
                            </a>
                        </div>
                    </div>
                    <!-- Check Button End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Controls Start -->
        <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Pesquisar" />
                    <span class="search-magnifier-icon">
                        <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                        <i data-acorn-icon="close"></i>
                    </span>
                </div>
            </div>
            <!-- Search End -->

            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                <div class="d-inline-block">
                    <!-- Print Button Start -->
                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-delay="0" title="Print" type="button">
                        <i data-acorn-icon="print"></i>
                    </button>
                    <!-- Print Button End -->

                    <!-- Export Dropdown Start -->
                    <div class="d-inline-block">
                        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                                data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
                                <i data-acorn-icon="download"></i>
                            </span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                            <button class="dropdown-item export-copy" type="button">Copiar</button>
                            <button class="dropdown-item export-excel" type="button">Excel</button>
                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                        </div>
                    </div>
                    <!-- Export Dropdown End -->

                    <!-- Length Start -->
                    <div class="dropdown-as-select d-inline-block" data-childSelector="span">
                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-bs-offset="0,3">
                            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-delay="0" title="Item Count">
                                10 Items
                            </span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                            <a class="dropdown-item" href="#">5 Items</a>
                            <a class="dropdown-item active" href="#">10 Items</a>
                            <a class="dropdown-item" href="#">20 Items</a>
                        </div>
                    </div>
                    <!-- Length End -->
                </div>
            </div>
        </div>
        <!-- Controls End -->

        <!-- Customers List Start -->
        <div class="row">
            <div class="col-12 mb-6">
                <div class="card mb-2 bg-transparent no-shadow d-none d-md-block">
                    <div class="card-body pt-0 pb-0 sh-3">
                        <div class="row g-0 h-100 align-content-center">
                            <div class="col-md-2 d-flex align-items-center text-muted text-small">Nome</div>
                            <div class="col-md-2 d-flex align-items-center text-muted text-small">Email</div>
                            <div class="col-md-2 d-flex align-items-center text-muted text-small">Endereço</div>
                            <div class="col-md-1 d-flex align-items-center text-muted text-small">Telefone</div>
                            <div class="col-md-1 d-flex align-items-center text-muted text-small">Ativo</div>
                            <div class="col-md-1 d-flex align-items-center text-muted text-small">Permissão</div>
                            <div class="col-md-1 d-flex align-items-center text-muted text-small">Ações</div>
                        </div>
                    </div>
                </div>
                <div id="checkboxTable">
                    @foreach ($users as $user)
                        <div class="card mb-2">
                            <div class="card-body pt-0 pb-0 sh-30 sh-md-8">
                                <div class="row g-0 h-100 align-content-center">
                                    <div
                                        class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-1 order-md-1">
                                        <div class="text-muted text-small d-lg-none">Nome</div>
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="text-truncate h-100 d-flex align-items-center">{{ $user->name }}</a>
                                    </div>
                                    <div
                                        class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-2 order-md-3">
                                        <div class="text-muted text-small d-lg-none">Email</div>
                                        <div class="text-alternate">{{ $user->email }}</div>
                                    </div>
                                    <div
                                        class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-3 order-md-4">
                                        <div class="text-muted text-small d-lg-none">Endereço</div>
                                        <div class="text-alternate">{{ $user->address }}</div>
                                    </div>
                                    <div
                                        class="col-6 col-md-1 d-flex flex-column justify-content-center mb-2 mb-md-0 order-4 order-md-5">
                                        <div class="text-muted text-small d-lg-none">Telefone</div>
                                        <div class="text-alternate">{{ $user->phone }}</div>
                                    </div>
                                    <div
                                        class="col-6 col-md-1 d-flex flex-column justify-content-center mb-2 mb-md-0 order-5 order-md-6">
                                        <div class="text-muted text-small d-lg-none">Ativo</div>
                                        <div class="text-alternate">{{ $user->active }}</div>
                                    </div>
                                    <div
                                        class="col-6 col-md-1 d-flex flex-column justify-content-center mb-2 mb-md-0 order-last order-md-7">
                                        <div class="text-muted text-small d-lg-none">Permissões</div>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <div class="text-alternate">{{ $v }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div
                                        class="col-6 col-md-1 d-flex flex-column justify-content-center mb-2 mb-md-0 order-last order-md-8">
                                        <div class="text-muted text-small d-lg-none">Ações</div>
                                        <div>
                                            <i class="text-primary me-2" data-acorn-icon="content" data-acorn-size="17"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Newsletter"></i>
                                            <i class="text-primary me-2" data-acorn-icon="boxes" data-acorn-size="17"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Purchased"></i>
                                            <i class="text-primary me-2" data-acorn-icon="check-square"
                                                data-acorn-size="17" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Trusted"></i>
                                            <i class="text-primary me-2" data-acorn-icon="phone" data-acorn-size="17"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phone"></i>
                                        </div>
                                    </div>
                                    {{-- <div
                                        class="col-1 col-md-1 d-flex flex-column justify-content-center align-items-md-end mb-2 mb-md-0 order-2 text-end order-md-last">
                                        <label class="form-check float-end pe-none mt-1">
                                            <input type="checkbox" class="form-check-input" />
                                        </label>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Customers List End -->

        <!-- Pagination Start -->

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $users->withQueryString()->links('pagination::bootstrap-5') }}

            {{-- <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link shadow" href="#" tabindex="-1" aria-disabled="true">
                            <i data-acorn-icon="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link shadow" href="#">1</a></li>
                    <li class="page-item"><a class="page-link shadow" href="#">2</a></li>
                    <li class="page-item"><a class="page-link shadow" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i data-acorn-icon="chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav> --}}
        </div>
        <!-- Pagination End -->
    </div>
@endsection
