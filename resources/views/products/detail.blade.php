@php
    $html_tag_data = [];
    $title = 'Produtos';
    $description = 'Ecommerce Product Detail Page';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/quill.bubble.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/vendor/tagify.css" />
    <link rel="stylesheet" href="/css/vendor/dropzone.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/imask.js"></script>
    <script src="/js/vendor/quill.min.js"></script>
    <script src="/js/vendor/quill.active.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
    <script src="/js/vendor/tagify.min.js"></script>
    <script src="/js/vendor/dropzone.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/dropzone.templates.js"></script>
    <script src="/js/pages/products.detail.js"></script>
@endsection

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
                            <span class="text-small align-middle">Produtos</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="w-100 d-md-none"></div>
                <div class="col-auto d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only"
                        data-delay='{"show":"500", "hide":"0"}' data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Save">
                        <i data-acorn-icon="save"></i>
                    </button>
                </div>
                <div class="col col-md-auto d-flex align-items-end justify-content-end">
                    <div class="btn-group ms-1 w-100 w-md-auto">
                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100">
                            <i data-acorn-icon="send"></i>
                            <span>Publish</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" type="button">Publicar</button>
                            <button class="dropdown-item" type="button">Desativar</button>
                            <button class="dropdown-item" type="button">Deletar</button>
                        </div>
                    </div>
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <div class="col-xl-8">
                <!-- Product Info Start -->
                <div class="mb-5">
                    <h2 class="small-title">Produto</h2>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">nome</label>
                                    <input type="text" nam="name" class="form-control"
                                        placeholder="digite o nome do produto" />
                                </div>
                                <div class="mb-3 w-100">
                                    <label class="form-label">Categorias</label>
                                    {!! Form::select('category[]', $roles, [], ['class' => 'select-single-no-search', 'multiple']) !!}
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descrição</label>
                                    <div class="html-editor-bubble html-editor sh-13" id="quillEditorBubble"
                                        name="description">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Product Info End -->

                <!-- Attributes Start -->
                <div class="mb-5">
                    <h2 class="small-title">Atributos</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-n6 border-last-none">
                                <div class="mb-3 pb-3 border-bottom border-separator-light" id="div_atributes">
                                    <div class="row gx-2">
                                        <div class="col col-md order-1">
                                            <div class="mb-3 w-100">
                                                <label class="form-label">Tamanho</label>
                                                <select class="select-single-no-search" placeholder='Escolha um tamanho'>
                                                    <option label="&nbsp;"></option>
                                                    <option value="Fixed Amount">P</option>
                                                    <option value="Free Shipping">M</option>
                                                    <option value="Percentage">G</option>
                                                    <option value="Percentage" selected>GG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-auto order-3" id="div_quantity">
                                            <div class="mb-0">
                                                <label class="form-label">Quantidade</label>
                                                <input class="form-control w-100 sw-md-13"placeholder="10"
                                                    name="quantity[]" />
                                            </div>
                                        </div>
                                        <div class="col-auto order-2 order-md-4 div_remove d-none">
                                            <label class="d-block form-label">&nbsp;</label>
                                            <button class="btn btn-icon btn-icon-only btn-outline-primary btn-remover"
                                                type="button">
                                                <i data-acorn-icon="bin"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 pb-3 border-bottom text-center">
                                    <button type="button" id="btn_atributes"
                                        class="btn btn-foreground hover-outline btn-icon btn-icon-start mt-2">
                                        <i data-acorn-icon="plus"></i>
                                        <span>Adicionar novo</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Attributes End -->
            </div>

            <div class="col-xl-4 mb-n5">
                <!-- Price Start -->
                <div class="mb-5">
                    <h2 class="small-title">Preço</h2>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Valor</label>
                                    <input type="text" class="form-control mask-currency" value="16,20"
                                        name="price" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Price End -->

                <!-- History Start -->
                <div class="mb-5">
                    <h2 class="small-title">Detalhes</h2>
                    <div class="card">
                        <div class="card-body mb-n3">
                            <div class="mb-3">
                                <div class="text-small text-muted">STATUS</div>
                                <div>Published</div>
                            </div>
                            <div class="mb-3">
                                <div class="text-small text-muted">CRIADO POR</div>
                                <div>Lisa Jackson</div>
                            </div>
                            <div class="mb-3">
                                <div class="text-small text-muted">DATA DE CRIACÃO</div>
                                <div>12.05.2021 - 13:42</div>
                            </div>
                            <div class="mb-3">
                                <div class="text-small text-muted">LINK DO PRODUTO</div>
                                <div>/products/wholewheat/cornbread</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- History End -->

                <!-- Image Start -->
                <div class="mb-5">
                    <h2 class="small-title">Image</h2>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-1 border-0 p-0"
                                    id="dropzoneProductImage"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Image End -->

                <!-- Gallery Start -->
                <div class="mb-5">
                    <h2 class="small-title">Galeria</h2>
                    <div class="card">
                        <div class="card-body">
                            <form class="mb-3">
                                <div class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-4 row-cols-xl-2 border-0 p-0"
                                    id="dropzoneProductGallery"></div>
                            </form>
                            <div class="text-center">
                                <button type="button"
                                    class="btn btn-foreground hover-outline btn-icon btn-icon-start mt-2"
                                    id="dropzoneProductGalleryButton">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Adicionar Imagens</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery End -->
            </div>
        </div>
    </div>
@endsection

<script type="module">
    $(document).ready(function() {
        $("#btn_atributes").on("click", function() {
            var clonedElement = $("#div_atributes").clone();
            clonedElement.find('.div_remove').removeClass('d-none')
            clonedElement.find('select').removeClass('select-single-no-search');
            clonedElement.insertAfter("#div_atributes");
            $(".select-single-no-search").select2();
        });
    });

    $(document).on("click", ".div_remove", function() {
        $(this).closest("#div_atributes").remove();
    });
</script>
