@extends('layouts.app')

@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('home').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-1 col-sm-1"></div>
            <div class="col-lg-6 col-md-10 col-sm-10" align="center">
                <br><br>
                <h1 style="margin-bottom: 0px;"><strong style="color:#941012">ATD</strong> Sistemas</h1>
                <h4>www.atdsistemas.com.br</h4>
                <br><br>
            </div>
            <div class="col-lg-3 col-md-1 col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Sistemas</p>
                                    <p class="card-title">

                                    <?php $a=0;  ?>
                                    @foreach(\App\ProductsModel::all() as $prod)
                                        <?php $a++; ?>
                                    @endforeach
                                    {{$a}}

                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            Disponíveis para Download
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Vendas</p>
                                    <p class="card-title">

                                    <?php $a=0;  ?>
                                    @foreach(\App\SalesModel::all() as $prod)
                                        <?php $a++; ?>
                                    @endforeach
                                    {{$a}}

                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            Concluídas
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Produção</p>
                                    <p class="card-title">
                                    <?php $a=0;  ?>
                                    @foreach(\App\DevelopmentModel::all() as $prod)
                                        <?php $a++; ?>
                                    @endforeach
                                    {{$a}}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                           Em Desenvolvimento
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-single-02 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Clientes</p>
                                    <p class="card-title">

                                    <?php $a=0;  ?>
                                    @foreach(\App\ClientsModel::all() as $prod)
                                        <?php $a++; ?>
                                    @endforeach
                                    {{$a}}

                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            Cadastrados
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
