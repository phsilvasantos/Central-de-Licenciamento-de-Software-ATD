@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('sales').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Nova <strong>Venda</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sales.update', ['saleModel' => $sale->id])}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Software</label>
                                        <select type="text" class="form-control" name="id_prod">
                                            <option value="{{$sale->id_prod}}">
                                                @foreach(\App\ProductsModel::all()->where('id',$sale->id_prod) as $dado)
                                                        {{$dado->name}}
                                                @endforeach
                                            </option>
                                            @foreach(\App\ProductsModel::all() as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select type="text" class="form-control" name="id_cli">
                                            <option value="{{$sale->id_cli}}">
                                                @foreach(\App\ClientsModel::all()->where('id',$sale->id_cli) as $dado)
                                                        {{$dado->name}}
                                                @endforeach
                                            </option>
                                            @foreach(\App\ClientsModel::all() as $user)
                                                <option value="{{$user->id}}">{{$user->company}} - {{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Endereço URL</label>
                                        <input type="text" class="form-control" name="url" value="{{$sale->url}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Implantação</label>
                                        <input type="text" class="form-control" name="development_value" placeholder="Ex: R$ 2.400,00" value="{{$sale->development_value}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fidelização</label>
                                        <select type="text" class="form-control" name="type_payment" value="{{$sale->type_payment}}">
                                            <option value="{{$sale->type_payment}}">
                                                @if($sale->type_payment==0)
                                                Mensalidade
                                            @else
                                                Anuidade
                                                @endif
                                            <option value="0">Mensalidade</option>
                                            <option value="1">Anuidade</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Valor (Mês/Ano)</label>
                                        <input type="text" class="form-control" name="payment_amount"  placeholder="Ex: R$ 300,00" value="{{$sale->payment_amount}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Data de Início</label>
                                        <input type="date" class="form-control" name="start_date" value="{{$sale->start_date}}"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-2">
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
