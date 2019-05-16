@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('products').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Novo <strong>Sistema</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome do Sistema</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Valor (Implementação / Mensalidade)</label>
                                        <input type="text" class="form-control" name="value" placeholder="Ex: R$ 1.000 / R$ 190,00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição do Sistema</label>
                                        <textarea class="form-control textarea" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição da Implementação</label>
                                        <textarea class="form-control textarea" name="implementation"></textarea>
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
