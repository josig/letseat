<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Plataforma de gestión gastronómica para instituciones." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://lets-eat.com.ar" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    @yield('styles')

    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    @PWA
</head>

<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">


    <!--begin::Main-->

    @include('partials._header-mobile')
    <div class="d-flex flex-column flex-root">

        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @role('Super Administrador|Administrador')
                @include('partials._aside')
            @endrole

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('partials._header')



                <!-- Modal-->
                <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form" id="transaction-form"
                                data-route="{{ route('transactions.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
								<input type="hidden" name="paymentMethod" value="1" />
								<input type="hidden" name="transactionConcept" value="1" />
								<input type="hidden" name="currency" value="1" />
								
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva Transacción</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Ingrese los datos necesarios para generar una nueva transacción

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>DNI del Responsable:</label>
                                            <input type="text" class="form-control" name="governmentId"
                                                placeholder="DNI" />
                                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                                        </div>
                                        <div class="form-group">
                                            <label>Monto a acreditar:</label>
                                            <input type="amount" class="form-control" name="amount"
                                                placeholder="Monto" />
                                            {{-- <span class="form-text text-muted">Well never share your email with anyone
                                                else</span> --}}
                                        </div>


										<div class="col-md-12">
											<div id="loading" class="text-center" style="margin-top:10px"></div>
											<div id="messages" class="alert" role="alert" style="margin-top:20px"></div>
											<p class="email-msg"></p>
										</div>





                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Cancelar</button>

                                    <button type="submit" class="btn btn-primary font-weight-bolder">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    @include('partials.subheader.subheader-v6', ['title'])

                    <!--Content area here-->
                    @yield('content')
                </div>

                <!--end::Content-->

                {{-- @include('partials._footer') --}}
            </div>

            <!--end::Wrapper-->
        </div>

        <!--end::Page-->
    </div>

    <!--end::Main-->


    {{-- @include('partials.extras.offcanvas.quick-notifications') --}}

    @unlessrole('Super Administrador|Administrador')
        @include('partials.extras.offcanvas.quick-actions')
    @endunlessrole

    @include('partials.extras.offcanvas.quick-user')
    {{-- @include('partials.extras.offcanvas.quick-panel')
		@include('partials.extras.chat')
		@include('partials.extras.scrolltop')
		@include('partials.extras.toolbar')
		@include('partials.extras.offcanvas.demo-panel') --}}

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#6993FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1E9FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>


    <!--end::Global Theme Bundle-->

    <!--begin::Page Vendors(used by this page)-->
    @yield('vendors')

    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    @yield('scripts')
    <script src="{{ asset('js/ajax.js') }}" type="text/javascript"></script>
    <!--end::Page Scripts-->

</body>

<!--end::Body-->

</html>
