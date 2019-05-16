@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('developments').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Novo <strong>Sistema</strong> para Desenvolvimento</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('development.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Nome do Sistema</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Gerente da Rodada</label>
                                        <select class="form-control textarea" name="id_manager">
                                            <option value="">Selecione um gerente</option>
                                            @foreach(\App\User::all() as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição do Sistema</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Informações de Desenvolvimento (link git, acessos)</label>
                                        <textarea class="form-control" name="info"></textarea>
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
