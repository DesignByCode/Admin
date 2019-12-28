<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="app-url" content="{{ config('app.url') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    @yield('scripts')

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
<div id="app">
    <div class="container">
        <!-- Menu -->
        <nav class="menu">
            <!-- Close button for mobile version -->
            <div class="menu__wrap">
                {{--<img src="{{ asset('./img/logo.svg') }}" alt="Logo">--}}
                <ul class="menu__level">


                    <li class="menu__item">
                        <a class="menu__link {{ set_active('admin', 'active') }}" data-submenu="submenu-1" href="{{ route('admin.index') }}"><span><i class="lunacon lunacon-dashboard"></i></span> Dashboard</a>
                    </li>
                    @role('super-admin')
                    <li class="menu__item">
                        <a class="menu__link {{ set_active('admin/users*', 'active') }}" data-submenu="submenu-5" href="{{ route('admin.users.index') }}"><span><i class="lunacon lunacon-users-solid"></i></span> Users</a>
                    </li>
                    <li class="menu__devider"></li>

                    <li class="menu__item">
                        <a class="menu__link {{ set_active('admin/categories*', 'active') }}" data-submenu="submenu-2" href="{{ route('admin.categories.index') }}"><span><i class="lunacon lunacon-document"></i></span>  Categories</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link{{ set_active('admin/products*', 'active') }}" data-submenu="submenu-4" href="{{ route('admin.products.index') }}"><span><i class="lunacon lunacon-box-opened"></i></span> Products</a>
                    </li>

                    <li class="menu__item">
                        <a class="menu__link {{ set_active('admin/tags*', 'active') }}" data-submenu="submenu-6" href="{{ route('admin.tags.index') }}"><span><i class="lunacon lunacon-tags"></i></span> Tags</a>
                    </li>
                    <li class="menu__devider"></li>
                    <li class="menu__item">
                        <a class="menu__link {{ set_active('admin/galleries*', 'active') }}" data-submenu="submenu-3" href="{{ route('admin.galleries.index') }}"><span><i class="lunacon lunacon-camera"></i></span> Galleries</a>
                    </li>
                    <li class="menu__devider"></li>
                    <li class="menu__item">
                        <a class="menu__link{{ set_active('admin/log*', 'active') }}" data-submenu="submenu-4" href="{{ route('admin.logs.index') }}"><span><i class="lunacon lunacon-files"></i></span> Logs</a>
                    </li>
{{--                     <li class="menu__item">
                        <a class="menu__link {{ set_active('admin/notifacation*', 'active') }}" data-submenu="submenu-7" href="{{ route('admin.notifacation.index') }}"><span><i class="lunacon lunacon-gears"></i></span> Notifacations</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" data-submenu="submenu-8" href="#"><span><i class="lunacon lunacon-gears"></i></span> Settings</a>
                    </li> --}}
                    @endrole

                </ul>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>
</div><!-- #app -->


</body>
</html>

