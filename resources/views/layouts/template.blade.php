@include('layouts.message')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="mariodamiaocaparroz@gmail.com">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('imgs/dashboard/favicon.ico') !!} ">
    <title>{{ config('app.name', 'RDDB - Aréa do Admin') }}</title>
    <!-- Custom CSS -->
    <link href=" {!! mix('assets/css/rddb.css') !!}" rel="stylesheet">
    @yield('head')

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">RDDB</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{!! asset('assets/images/logo-icon.png') !!}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{!! asset('assets/images/logo-light-icon.png') !!}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">RDDB</span>Admin</span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" ><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" ><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Buscar">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Paulo Doria</h5> <span class="mail-desc">Enviou correções solicitadas!</span> <span class="time">21:30</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Evento hoje</h5> <span class="mail-desc">Lembrete: Dissertação Case</span> <span class="time">18:10</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Configurações</h5> <span class="mail-desc">Layout Alterado com sucesso!</span> <span class="time">14:08</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Jair Silva</h5> <span class="mail-desc">Te marcou como orientador!</span> <span class="time">9:02</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href=";"> <strong>Ver todas as notificações</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>--}}
                                {{--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<div class="drop-title">You have 4 new messages</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="message-center">--}}
                                            {{--<!-- Message -->--}}
                                            {{--<a href="javascript:void(0)">--}}
                                                {{--<div class="user-img"> <img src="{!! asset('assets/images/users/1.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>--}}
                                                {{--<div class="mail-contnet">--}}
                                                    {{--<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>--}}
                                            {{--</a>--}}
                                            {{--<!-- Message -->--}}
                                            {{--<a href="javascript:void(0)">--}}
                                                {{--<div class="user-img"> <img src="{!! asset('assets/images/users/2.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>--}}
                                                {{--<div class="mail-contnet">--}}
                                                    {{--<h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>--}}
                                            {{--</a>--}}
                                            {{--<!-- Message -->--}}
                                            {{--<a href="javascript:void(0)">--}}
                                                {{--<div class="user-img"> <img src="{!! asset('assets/images/users/3.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>--}}
                                                {{--<div class="mail-contnet">--}}
                                                    {{--<h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>--}}
                                            {{--</a>--}}
                                            {{--<!-- Message -->--}}
                                            {{--<a href="javascript:void(0)">--}}
                                                {{--<div class="user-img"> <img src="{!! asset('assets/images/users/4.jpg') !!}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>--}}
                                                {{--<div class="mail-contnet">--}}
                                                    {{--<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a class="nav-link text-center link" href=";"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        {{--<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>--}}
                            {{--<div class="dropdown-menu animated bounceInDown">--}}
                                {{--<ul class="mega-dropdown-menu row">--}}
                                    {{--<li class="col-lg-3 col-xlg-2 m-b-30">--}}
                                        {{--<h4 class="m-b-20">CAROUSEL</h4>--}}
                                        {{--<!-- CAROUSEL -->--}}
                                        {{--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
                                            {{--<div class="carousel-inner" role="listbox">--}}
                                                {{--<div class="carousel-item active">--}}
                                                    {{--<div class="container"> <img class="d-block img-fluid" src="{{ asset('assets/images/big/img1.jpg') }}" alt="First slide"></div>--}}
                                                {{--</div>--}}
                                                {{--<div class="carousel-item">--}}
                                                    {{--<div class="container"><img class="d-block img-fluid" src="{{ asset('assets/images/big/img2.jpg') }}" alt="Second slide"></div>--}}
                                                {{--</div>--}}
                                                {{--<div class="carousel-item">--}}
                                                    {{--<div class="container"><img class="d-block img-fluid" src="{{ asset('assets/images/big/img3.jpg') }}" alt="Third slide"></div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>--}}
                                            {{--<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>--}}
                                        {{--</div>--}}
                                        {{--<!-- End CAROUSEL -->--}}
                                    {{--</li>--}}
                                    {{--<li class="col-lg-3 m-b-30">--}}
                                        {{--<h4 class="m-b-20">ACCORDION</h4>--}}
                                        {{--<!-- Accordian -->--}}
                                        {{--<div class="accordion" id="accordionExample">--}}
                                            {{--<div class="card m-b-0">--}}
                                                {{--<div class="card-header bg-white p-0" id="headingOne">--}}
                                                    {{--<h5 class="mb-0">--}}
                                                        {{--<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                                            {{--Collapsible Group Item #1--}}
                                                        {{--</button>--}}
                                                    {{--</h5>--}}
                                                {{--</div>--}}

                                                {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--Anim pariatur cliche reprehenderit, enim eiusmod high.--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="card m-b-0">--}}
                                                {{--<div class="card-header bg-white p-0" id="headingTwo">--}}
                                                    {{--<h5 class="mb-0">--}}
                                                        {{--<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"--}}
                                                            {{--aria-controls="collapseTwo">--}}
                                                            {{--Collapsible Group Item #2--}}
                                                        {{--</button>--}}
                                                    {{--</h5>--}}
                                                {{--</div>--}}
                                                {{--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--Anim pariatur cliche reprehenderit, enim eiusmod high.--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="card m-b-0">--}}
                                                {{--<div class="card-header bg-white p-0" id="headingThree">--}}
                                                    {{--<h5 class="mb-0">--}}
                                                        {{--<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"--}}
                                                            {{--aria-controls="collapseThree">--}}
                                                            {{--Collapsible Group Item #3--}}
                                                        {{--</button>--}}
                                                    {{--</h5>--}}
                                                {{--</div>--}}
                                                {{--<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--Anim pariatur cliche reprehenderit, enim eiusmod high.--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-lg-3  m-b-30">--}}
                                        {{--<h4 class="m-b-20">CONTACT US</h4>--}}
                                        {{--<!-- Contact -->--}}
                                        {{--<form>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<input type="email" class="form-control" placeholder="Enter email"> </div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>--}}
                                            {{--</div>--}}
                                            {{--<button type="submit" class="btn btn-info">Submit</button>--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-lg-3 col-xlg-4 m-b-30">--}}
                                        {{--<h4 class="m-b-20">List style</h4>--}}
                                        {{--<!-- List style -->--}}
                                        {{--<ul class="list-style-none">--}}
                                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>--}}
                                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>--}}
                                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>--}}
                                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>--}}
                                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{!! asset('assets/images/users/1.jpg') !!}" alt="user" class=""> <span class="hidden-md-down">Prof. Caio &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Meu Perfil</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="pages-login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Sair</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/') }}"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/usuario') }}"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Usuários (OFF)</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/item') }}"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Materiais científicos(OFF)</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/cargos') }}"><i class="mdi mdi-worker"></i><span class="hide-menu">Cargos</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/arquivo_extensao') }}"><i class="mdi mdi-file-question"></i><span class="hide-menu">Extensões de Arquivo</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/papel') }}"><i class="mdi mdi-account-box-multiple"></i><span class="hide-menu">Papéis</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/situacao') }}"><i class="mdi mdi-calendar-multiple-check"></i><span class="hide-menu">Situações</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/colecao') }}"><i class="mdi mdi-book-multiple-variant"></i><span class="hide-menu">Coleções</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/tags') }}"><i class="mdi mdi-tag-text-outline"></i><span class="hide-menu">Tags</span></a>
                        </li>
                         
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-home-modern"></i><span class="hide-menu">Instituição</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ url('/dashboard/curso') }}">
                                        <i class="mdi mdi-certificate"> </i>
                                        Cursos
                                    </a>
                                </li>
                                <
                                <li>
                                    <a href="{{ url('/dashboard/disciplina') }}" >
                                        <i class="mdi mdi-book-open-outline"</i>
                                           Disciplinas
                                    </a>
                                </li>
                            </ul>

                        </li>


                        <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/configuracao_sistema') }}"><i class="mdi mdi-settings-box"></i><span class="hide-menu">Configurações</span></a>
                        </li>

                        {{--<li> <a class="has-arrow waves-effect waves-dark" href="{{ url('/dashboard/configuracao_sistema') }}" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Configurações</span></a>--}}
                            {{--<ul aria-expanded="false" class="collapse">--}}
                                {{--<li><a href="javascript:void(0)">item 1.1</a></li>--}}
                                {{--<li><a href="javascript:void(0)">item 1.2</a></li>--}}
                                {{--<li><a href="javascript:void(0)">item 1.3</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <li class="nav-small-cap">--- SUPORTE</li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentação</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        {{--<h4 class="text-themecolor">@yield('title')</h4>--}}
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                {{--<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>--}}
                                {{--<li class="breadcrumb-item active">@yield('title')</li>--}}

                                <li class="breadcrumb-item"> <a href="/">Home</a></li>
                                <?php $link = "" ?>
                                @for($i = 1; $i <= count(Request::segments()); $i++)
                                    @if($i < count(Request::segments()) & $i > 0)
                                        <?php $link .= "/" . Request::segment($i); ?>
                                        @if(  strlen(ucwords(str_replace('-',' ',Request::segment($i)))) > '1'  )
                                            <li class="breadcrumb-item"> <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li>
                                        @endif
                                    @else <li class="breadcrumb-item active">{{ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
                                    @endif
                                @endfor
                            </ol>
                            @yield('button_create')

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        @yield('alert_message')
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Customize seu Layout <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>Menu lateral claro</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>Menu lateral escuro</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 Mario Caparroz
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="{!! mix('assets/js/rddb.js') !!}"></script>
    @yield('script')
</body>

</html>
