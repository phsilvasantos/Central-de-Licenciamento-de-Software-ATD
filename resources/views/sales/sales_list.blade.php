@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('sales').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 100%">
                        <div>
                        <h4 class="card-title float-left"> Controle de <strong>Vendas</strong></h4>
                            <a href="{{route('sales.new')}}" class="btn btn-primary float-right">Nova</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Software
                                </th>
                                <th>
                                    Valor / Mensalidade
                                </th>
                                <th>
                                    Data de Início
                                </th>
                                <th>
                                </th>
                                </thead>

                                <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>
                                        <strong>
                                            @foreach(\App\ProductsModel::all()->where('id',$sale->id_prod) as $dado)
                                                {{$dado->name}}
                                            @endforeach
                                        </strong><br>
                                        <p style="margin: 0">{{$sale->url}}</p>
                                        @foreach(\App\ClientsModel::all()->where('id',$sale->id_cli) as $dado)
                                                {{$dado->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <strong>R$ {{$sale->development_value}}</strong><br>
                                        @if($sale->type_payment==0)
                                            Mensalidade:
                                        @else
                                            Anuidade:
                                        @endif
                                        : R$ {{$sale->payment_amount}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->start_date)->format('d/m/Y')}}
                                    </td>
                                    <td>
                                        <a href="{{route('sales.edit', $sale->id)}}">
                                            <i style="font-size: 20px; color: green" class="nc-icon nc-ruler-pencil"></i>
                                        </a>
                                        <a href="{{route('sales.remove', $sale->id)}}">
                                            <i style="font-size: 20px; color: red" class="nc-icon nc-simple-remove"></i>
                                        </a>

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
