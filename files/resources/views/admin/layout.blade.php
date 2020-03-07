<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
<div class="page home-page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <a href="{{url('admin')}}" class="navbar-brand">
                            <div class="brand-text brand-big"><strong>Главная</strong></div>
                            {{--<div class="brand-text brand-small"><strong>BD</strong></div>--}}
                        </a>
                        <!-- Toggle Button-->
                        {{--<a id="toggle-btn" href="#"
                           class="menu-btn active"><span></span><span></span><span></span></a>--}}
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Search-->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i
                                        class="icon-search"></i></a></li>
                        <!-- Logout    -->
                        {{--<li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i
                                        class="fa fa-sign-out"></i></a></li>--}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch page-layout">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">

            </div>
            <!-- Sidebar Navidation Menus-->
          {{--  <span class="heading">Main</span>--}}
            <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/categories')}}"><i class="fa fa-list"></i></i>Категории</a></li>
                <li class="active"><a href="{{url('admin/products')}}"><i class="fa fa-list"></i></i>Продукты</a></li>
                {{--<li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
                <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>--}}
                {{--<li><a href="login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>--}}
            </ul>
            {{--<span class="heading">Extras</span>--}}
           {{-- <ul class="list-unstyled">
                <li><a href="#"> <i class="icon-flask"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-screen"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-mail"></i>Demo </a></li>
                <li><a href="#"> <i class="icon-picture"></i>Demo </a></li>
            </ul>--}}
        </nav>
        <div class="content-inner">

            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">@yield('title')</h2>
                </div>
            </header>
            <div class="content-wrap">
                @yield('content')
        </div>
    </div>
</div>
</body>
</html>