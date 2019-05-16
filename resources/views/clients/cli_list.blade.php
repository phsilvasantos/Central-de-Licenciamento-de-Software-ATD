@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('clients').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 100%">
                        <div>
                        <h4 class="card-title float-left"> Nossos <strong>Clientes</strong></h4>
                            <a href="{{route('clients.new')}}" class="btn btn-primary float-right">Novo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Empresa
                                </th>
                                <th>
                                    CPF/CNPJ
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Telefone
                                </th>
                                <th>
                                    Ações
                                </th>
                                </thead>

                                <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <strong>{{$client->company}}</strong><br>
                                        {{$client->name}}
                                    </td>
                                    <td>
                                        {{$client->cpf}}
                                    </td>
                                    <td>
                                        {{$client->email}}
                                    </td>
                                    <td>
                                        {{$client->phone}}
                                    </td>
                                    <td>
                                        <a href="{{route('clients.edit', $client->id)}}">
                                            <i style="font-size: 20px; color: green" class="nc-icon nc-ruler-pencil"></i>
                                        </a>
                                        <a href="{{route('clients.remove', $client->id)}}">
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
