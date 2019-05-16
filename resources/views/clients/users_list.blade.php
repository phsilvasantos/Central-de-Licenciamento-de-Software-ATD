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
                        <h4 class="card-title float-left"><strong>Usuários</strong> do Sistema</h4>
                            <a href="{{route('register')}}" class="btn btn-primary float-right">Novo</a>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Email
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
                                        {{$client->email}}
                                    </td>
                                    <td>
                                        <a href="{{route('user.remove', $client->id)}}">
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
