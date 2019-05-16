@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('clients').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Novo <strong>Sistema</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('musics.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control" name="company">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome do Responsável</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ponto de Referência</label>
                                        <input type="text" class="form-control" name="rf_point"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF/CNPJ</label>
                                        <input type="text" class="form-control" name="cpf"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" name="phone"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
