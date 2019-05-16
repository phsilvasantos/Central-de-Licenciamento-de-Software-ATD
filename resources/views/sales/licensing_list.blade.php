@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('licenses').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 100%">
                        <div>
                        <h4 class="card-title float-left"><strong>Licenciameto</strong> de Software</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Software
                                </th>
                                <th>
                                    Data de Vencimento
                                </th>
                                <th>
                                    Renovar até
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
                                        {{\Carbon\Carbon::parse($sale->licensing)->format('d/m/Y')}}
                                    </td>
                                    <form action="{{route('licensing.update', ['licensing' => $sale->id])}}" method="post">
                                        {{csrf_field()}}
                                    <td>
                                        <input type="date" class="form-control" name="licensing">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"><i class="nc-icon nc-refresh-69"></i></button>
                                    </td>
                                    </form>
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
