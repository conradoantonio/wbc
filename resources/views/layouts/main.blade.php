<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">
    <meta name="user-id" content="{{ auth()->user() }}">
    <title>@yield('title', isset($title) ? $title .' | '.env('APP_NAME') : env('APP_NAME'))</title>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/pace/pace.css') }}">
    <script src="{{ asset('vendor/pace/pace.min.j') }}s"></script>
    <!--vendors-->
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/noppa/text-security/master/dist/text-security.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-scrollbar/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/timepicker/bootstrap-timepicker.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/jost/jost.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=1.1') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.css') }}">

    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/materialdesignicons/materialdesignicons.min.css') }}">
    <!--Bootstrap + atmos Admin CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/atmos.css') }}">
    <!-- Additional library for page -->
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    
    {{-- Summernote --}}
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}"/>

    {{-- Gallery plugin --}}
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

</head>
<body class="sidebar-pinned">
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        {{-- <img class="admin-brand-logo" src="{{ asset('img/logo.png') }}" width="40" alt="atmos Logo"> --}}
        {{-- Cambiar logo horizontal --}}
        <span class="text-center admin-brand-content font-secondary"><a href="{{url(auth()->user()->role_id == 1 ? 'dashboard' : 'mi-perfil')}}"> <img width="250px" src="{{url('img/logo_horizontal_white.png')}}"></a></span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Inicio']) ? 'active opened' : ''}}">
                <a href="{{url('dashboard')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Inicio</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-view-dashboard-outline"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Proyectos']) ? 'active opened' : ''}}">
                <a href="{{url('proyectos')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Proyectos</span>
                    </span>
                    <span class="menu-icon">
                        <i class="mdi mdi-office-building"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Propiedades']) ? 'active opened' : ''}}">
                <a href="{{url('propiedades')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Propiedades</span>
                    </span>
                    <span class="menu-icon">
                        <i class="mdi mdi-home-circle"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Blogs']) ? 'active opened' : ''}}">
                <a href="{{url('blogs')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Blogs</span>
                    </span>
                    <span class="menu-icon">
                        <i class="mdi mdi-blogger"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Pagos']) ? 'active opened' : ''}}">
                <a href="{{url('pagos')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Pagos</span>
                    </span>
                    <span class="menu-icon">
                        <i class="mdi mdi-finance"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Prensa']) ? 'active opened' : ''}}">
                <a href="{{url('prensa')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Prensa</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-newspaper"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Premios']) ? 'active opened' : ''}}">
                <a href="{{url('premios')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Premios</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-trophy"></i>
                    </span>
                </a>
            </li>
            @endif

            {{-- @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ $title == 'Notificaciones push' ? 'active' : ''}}">
                <a href="{{url('notificaciones-push')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Notificaciones</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-bell"></i>
                    </span>
                </a>
            </li>
            @endif --}}
            
            @if( in_array(auth()->user()->role->name, ['Administrador', 'App', 'Alterno']) )
            <li class="menu-item {{ in_array($menu, ['Mi perfil']) ? 'active opened' : ''}}">
                <a href="{{url('mi-perfil')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Mi perfil</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-account"></i>
                    </span>
                </a>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Usuarios']) ? 'active opened' : ''}}">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Usuarios<span class="menu-arrow"></span></span>
                    </span>
                    <span class="menu-icon"><i class="icon-placeholder mdi mdi-account-group"></i></span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" style="{{ $menu == 'Usuarios' ? 'display: block' : 'display: none'}};">
                    <li class="menu-item">
                        @if( in_array(auth()->user()->role->name, ['Administrador']) )
                        <a href="{{url('usuarios/clientes')}}" class="menu-link">
                            <span class="menu-label"><span class="menu-name {{ ( in_array($menu, ['Usuarios']) && in_array($title, ['Clientes', 'Formulario de cliente']) ) ? 'sub-ative' :'' }}">Clientes</span></span>
                        </a>
                        @endif
                    </li>
                </ul>
            </li>
            @endif

            @if( in_array(auth()->user()->role->name, ['Administrador']) )
            <li class="menu-item {{ in_array($menu, ['Configuración']) ? 'active opened' : ''}}">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Configuración<span class="menu-arrow"></span></span>
                    </span>
                    <span class="menu-icon"><i class="icon-placeholder mdi mdi-cogs"></i></span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" style="{{ $menu == 'Configuración' ? 'display: block' : 'display: none'}};">
                    <li class="menu-item">
                        {{-- <a href="{{url('configuracion/aviso-de-privacidad')}}" class="menu-link">
                            <span class="menu-label"><span class="menu-name {{ ( in_array($menu, ['Configuración']) && in_array($title, ['Aviso de privacidad']) ) ? 'sub-ative' :'' }}">Aviso de privacidad</span></span>
                        </a>
                        <a href="{{url('configuracion/terminos-y-condiciones')}}" class="menu-link">
                            <span class="menu-label"><span class="menu-name {{ ( in_array($menu, ['Configuración']) && in_array($title, ['Términos y condiciones']) ) ? 'sub-ative' :'' }}">Términos y condiciones</span></span>
                        </a> --}}
                        <a href="{{url('configuracion/preguntas-frecuentes')}}" class="menu-link">
                            <span class="menu-label"><span class="menu-name {{ ( in_array($menu, ['Configuración']) && in_array($title, ['Preguntas frecuentes', 'Formulario preguntas frecuentes']) ) ? 'sub-ative' :'' }}">Preguntas frecuentes</span></span>
                        </a>
                        <a href="{{url('configuracion/soporte')}}" class="menu-link">
                            <span class="menu-label"><span class="menu-name {{ ( in_array($menu, ['Configuración']) && in_array($title, ['Soporte', 'Formulario de soporte']) ) ? 'sub-ative' :'' }}">Soporte</span></span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <li class="menu-item log-out">
                <a href="javascript:;" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Cerrar sesión</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-logout"></i>
                    </span>
                </a>
            </li>
        </ul>{{-- Ul menu container --}}
    </div>

</aside>
<main class="admin-main">
    <!--site header begins-->
    <header class="admin-header">
        <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>
        <nav class=" mr-auto my-auto"></nav>
        <nav class=" ml-auto">
            <ul class="nav align-items-center">
                <li>{{ auth()->user()->fullname }}</li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="{{ asset(auth()->user()->photo)}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @if( in_array(auth()->user()->role->descripcion, ['Administrador', 'Cliente', 'Alterno']) )
                            <a class="dropdown-item" href="{{url('mi-perfil')}}">Cambiar contraseña</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item log-out" href="javascript:;">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <!--site header ends -->    
    @yield('content')
</main>

<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('vendor/popper/popper.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('vendor/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ asset('vendor/listjs/listjs.min.js')}}"></script>
<script src="{{ asset('vendor/moment/moment.min.js')}}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('js/atmos.min.js')}}"></script>
<script src="{{ asset('vendor/DataTables/datatables.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/systemFunctions.js')}}"></script>
<script src="{{ asset('js/general-ajax.js')}}"></script>
<script src="{{ asset('js/validfunctions.js')}}"></script>
<script src="{{ asset('js/globalFunctions.js?v=1.2')}}"></script>
<script src="{{ asset('vendor/blockui/jquery.blockUI.js')}}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('vendor/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('vendor/jquery.mask/jquery.mask.min.js') }}"></script>
{{-- <script src="https://js.pusher.com/4.1/pusher.min.js"></script> --}}
<script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-notify-data.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>

{{-- Summernote --}}
<script src="{{ asset('/vendor/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/js/summernote-data.js') }}"></script>

{{-- Printable --}}
<script src="{{ asset('js/invoice-print.js') }}"></script>

{{-- Gallery plugin --}}
<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

<!--page specific scripts for demo-->

<!--Additional Page includes-->
<script src="{{ asset('vendor/apexchart/apexcharts.min.js')}}"></script>
<!--chart data for current dashboard-->
<script src="{{ asset('/js/dashboard-02.js')}}"></script>

<script type="text/javascript">
    var puntos_min = 33;
    id_photos = [];
    var baseUrl = "{{url('')}}";
    var current_user_id = $('meta[name=user-id]').attr('content');
</script>
</body>
</html>


