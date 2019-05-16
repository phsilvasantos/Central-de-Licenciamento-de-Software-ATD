<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATD - Gerenciamento</title>


        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script>

    </head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
                <div class="logo-image-small" align="center">
                    <h4 style="margin-bottom: 0px;"><strong style="color:#941012">ATD</strong> Sistemas</h4>
                    <h5 style="font-size: 15px">www.atdsistemas.com.br</h5>
                    <br>
                </div></a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li id="home">
                    <a href="{{route('index')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li id="clients">
                    <a href="{{route('clients.index')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li id="sales">
                    <a href="{{route('sales.index')}}">
                        <i class="nc-icon nc-cart-simple"></i>
                        <p>Vendas</p>
                    </a>
                </li>
                <li id="products">
                    <a href="{{route('products.index')}}">
                        <i class="nc-icon nc-box-2"></i>
                        <p>Sistemas</p>
                    </a>
                </li>
                <li id="developments">
                    <a href="{{route('development.index')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Produção</p>
                    </a>
                </li>
                <li id="licenses">
                    <a href="{{route('licensing.index')}}">
                        <i class="nc-icon nc-key-25"></i>
                        <p>Licença de Software</p>
                    </a>
                </li>
                <li id="users">
                    <a href="{{route('user.index')}}">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>Usuários</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Olá {{Auth::user()->name}}</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block"></span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="content">
    @include('flash::message')
        <main class="py-4">

            @yield('content')
        </main>
</div>

        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <div class="credits ml-auto">
              <span class="copyright">
                  <h6 style="margin-bottom: 0px;"><strong style="color:#941012">ATD</strong> Sistemas</h6>
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>


<div id="MyModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 20px" align="center">

        <!-- Modal content-->
        <div class="modal-content" align="center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="name"></h4>
                <br>
                <h5></h5>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>

<script type="text/javascript" src="//code.jquery.com/jquery.js"></script>
<script>
    $('#flash-overlay-modal').modal();
</script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
</body>

<script src="{{ URL::asset('assets/js/core/jquery.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->


<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ URL::asset('assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>


<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/functions_js.js') }}"></script>
</html>

