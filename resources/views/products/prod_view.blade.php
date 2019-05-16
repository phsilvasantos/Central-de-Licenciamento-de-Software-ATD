@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('products').className = 'active';
    </script>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-user">
                                                    <div class="image">
                                                        <img src="{{ asset('assets/img/backtwo.jpg') }}" alt="..." width="100%">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="author">
                                                                <img class="avatar border-gray" src="{{ asset('assets/img/round.png') }}" alt="...">
                                                                <h5 class="title">{{$product->name}}</h5>
                                                            <p class="description">
                                                                <a href="{{route('products.remove', ['$id'=> $product->id])}}">Excluir Sistema</a>
                                                            </p>
                                                        </div>
                                                        <p class="description text-justify" style="margin-left: 20px; margin-right: 20px">
                                                            <strong>Descrição</strong><br>
                                                            {{$product->description}}
                                                            <br>
                                                            <br>
                                                            <strong>Dados da Implementação</strong><br>
                                                            {{$product->implementation}}
                                                        </p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <hr>
                                                        <div class="button-container">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                                                    <h5><?php $a=0;  ?>
                                                                        @foreach(\App\SalesModel::all()->where('id_prod', $product->id) as $prod)
                                                                            <?php $a++; ?>
                                                                        @endforeach
                                                                        {{$a}}
                                                                        <br>
                                                                        <small>Implantações</small>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                                                    <h5><strong>R$ </strong>{{$product->value}}
                                                                        <br>
                                                                        <small>Implementação / Mensalidade</small>
                                                                        <br>
                                                                        <small>Média de Valor</small>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-3 mr-auto">
                                                                    <h5>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/Y - H:i')}}
                                                                        <br>
                                                                        <small>Data de Cadastro</small>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="width: 100%">
                                                        <div>
                                                            <h4 class="card-title float-left"> Versões do Sistema</h4>
                                                            <a href="{{route('version.new',['id'=>$product->id])}}" class="btn btn-primary float-right" style="color: white"><i style="font-size: 14px" class="nc-icon nc-cloud-upload-94"></i>&nbsp;Upload de Versão</a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table">
                                                                <table class="table">
                                                                    <thead class=" text-primary">
                                                                    <th>
                                                                        Versão
                                                                    </th>
                                                                    <th>
                                                                        Data de Upload
                                                                    </th>
                                                                    <th>
                                                                        Tamanho
                                                                    </th>
                                                                    <th>
                                                                        Ação
                                                                    </th>
                                                                    </thead>

                                                                    <tbody>

                                                                    @foreach(\App\VersionModel::all()->where('id_sistema',$product->id) as $version)
                                                                        <tr>
                                                                            <td>
                                                                                {{$version->name}}
                                                                            </td>
                                                                            <td>
                                                                                {{\Carbon\Carbon::parse($version->created_at)->format('d/m/Y - H:i')}}
                                                                            </td>
                                                                            <td>
                                                                                {{$version->size}}
                                                                            </td>
                                                                            <td>

                                                                                <a href="{{route('version.remove',['id'=>$version->id])}}">
                                                                                    <i style="font-size: 25px; color: #8e8c8a" class="nc-icon nc-simple-remove"></i>
                                                                                </a>
                                                                                <a href="{{route('version.download',['id'=>$version->link])}}">
                                                                                    <i style="font-size: 25px; margin-left: 10px; color: #8e8c8a" class="nc-icon nc-cloud-download-93"></i>
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
