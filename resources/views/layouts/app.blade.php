<!DOCTYPE html>
<html lang="en">
    <head>
        <base href=""/>
        <title>@yield('title', 'Metronic Admin Dashboard')</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description', 'The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals.')" />
        <meta name="keywords" content="@yield('meta_keywords', 'metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits')" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="@yield('og_title', 'Metronic | Bootstrap HTML Admin Dashboard Theme')" />
        <meta property="og:url" content="@yield('og_url', 'https://keenthemes.com/metronic')" />
        <meta property="og:site_name" content="@yield('og_site_name', 'Keenthemes | Metronic')" />
        <link rel="canonical" href="@yield('canonical', 'https://preview.keenthemes.com/metronic8')" />
        <link rel="shortcut icon" href="{{ asset('demo/dist/assets/media/logos/favicon.ico') }}" />
        
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
        
        <!--begin::Vendor Stylesheets-->
        @yield('vendor_styles')
        <!--end::Vendor Stylesheets-->
        
        <!--begin::Global Stylesheets Bundle-->
        <link href="{{ asset('demo/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('demo/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
        
        <!--begin::DataTables CSS-->
        <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <!--end::DataTables CSS-->
        
        @yield('styles')
    </head>
    <body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <!--begin::Theme mode setup on page load-->
        <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
        <!--end::Theme mode setup on page load-->
        
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <!--begin::Header-->
                @include('layouts.partials.header')
                <!--end::Header-->
                
                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('layouts.partials.sidebar')
                    
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            @yield('content')
                        </div>
                        <!--end::Content wrapper-->
                        
                        @include('layouts.partials.footer')
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->
        
        <!--begin::Vendors Javascript-->
        @yield('vendor_scripts')
        <!--end::Vendors Javascript-->
        
        <!--begin::Custom Javascript-->
        <script>
            console.log('Loading jQuery...');
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            console.log('jQuery loaded:', typeof $ !== 'undefined');
            console.log('jQuery version:', $.fn.jquery);
        </script>
        <script src="{{ asset('demo/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('demo/dist/assets/js/scripts.bundle.js') }}"></script>
        
        <!--begin::DataTables JS-->
        <script>
            console.log('Loading DataTables...');
        </script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            console.log('DataTables loaded:', typeof $.fn.DataTable !== 'undefined');
            console.log('DataTables version:', $.fn.dataTable.version);
        </script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
        <!--end::DataTables JS-->
        
        @stack('scripts')
        <!--end::Custom Javascript-->
    </body>
</html>
