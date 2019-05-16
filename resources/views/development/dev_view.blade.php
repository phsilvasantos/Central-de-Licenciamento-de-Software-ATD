@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('developments').className = 'active';
    </script>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-user">

                                                    <div class="card-body">
                                                                <h5 class="title" align="center" style="margin-left: 30px">{{$development->name}}</h5>
                                                        <p align="center"><strong>Gerente: </strong>
                                                            @foreach(\App\User::all()->where('id',$development->id_manager) as $dado)
                                                                    {{$dado->name}}
                                                            @endforeach
                                                            </p>
                                                        <a class="float-right" href="{{route('development.remove', ['$id'=> $development->id])}}"><i style="font-size: 20px; color: red; margin: 20px" class="nc-icon nc-simple-remove"></i></a>
                                                        <a class="float-right" href="{{route('development.edit', ['$id'=> $development->id])}}"><i style="font-size: 20px; color: green; margin: 20px" class="nc-icon nc-ruler-pencil"></i></a>
                                                        <p class="description text-justify" style="margin-left: 20px; margin-right: 20px">
                                                            <strong>Descrição</strong><br>
                                                            {{$development->description}}
                                                            <br>
                                                            <br>
                                                            <strong>Dados da Implementação</strong><br>
                                                            {{$development->info}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="width: 100%">
                                                        <div>
                                                            <h4 class="card-title float-left"> Anexos</h4>
                                                            <a href="{{route('attachments.new',['id'=>$development->id])}}" class="btn btn-primary float-right" style="color: white"><i style="font-size: 14px" class="nc-icon nc-cloud-upload-94"></i>&nbsp;Upload de Anexo</a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table">
                                                                <table class="table">
                                                                    <thead class=" text-primary">
                                                                    <th>
                                                                        Anexo
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

                                                                    @foreach(\App\AttachmentsModel::all()->where('id_dev',$development->id) as $version)
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

                                                                                <a href="{{route('attachments.remove',['id'=>$version->id])}}">
                                                                                    <i style="font-size: 25px; color: #8e8c8a" class="nc-icon nc-simple-remove"></i>
                                                                                </a>
                                                                                <a href="{{route('attachments.download',['id'=>$version->link])}}">
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


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="width: 100%">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="card-title float-left"><strong>Requisitos</strong></h4>
                                                                </div>
                                                            </div>

                                                                <form action="{{route('requirements.store')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <div class="row">
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" type="text" name="name" placeholder="Novo Requisito..."/>
                                                                    </div>
                                                                        <input type="hidden" name="id_dev" value="{{$development->id}}"/>
                                                                    <div class="col-md-2">
                                                                        <button type="submit" style="margin: 0;" class="btn btn-success"><i class="nc-icon nc-simple-add"></i></button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table">
                                                                <table class="table">
                                                                    <tbody>
                                                                    @foreach(\App\RequirementsModel::all()->where('id_dev',$development->id) as $requirement)
                                                                        <tr>
                                                                            <td>
                                                                                @if($requirement->status==1)
                                                                                    <i style="font-size: 20px; color: green" class="nc-icon nc-check-2"></i>
                                                                                @endif
                                                                                <strong>{{$requirement->name}}</strong><br>
                                                                                {{\Carbon\Carbon::parse($requirement->created_at)->format('d/m/Y - H:i')}}
                                                                            </td>
                                                                            <td>
                                                                                <a class="float-right" href="{{route('requirements.remover', ['$id'=> $requirement->id])}}" title="Excluir" style="color: red; margin: 3px"><i style="font-size: 20px; color: red" class="nc-icon nc-simple-remove"></i></a>
                                                                                @if($requirement->status!=1)
                                                                                    <a class="float-right" href="{{route('requirements.resolvido', ['$id'=> $requirement->id])}}" title="Concluído" style="color: green; margin: 3px"><i style="font-size: 20px; color: green" class="nc-icon nc-check-2"></i></a>
                                                                                @endif
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




                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="width: 100%">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="card-title float-left"><strong>Atividades</strong></h4>
                                                                </div>
                                                            </div>

                                                                <form action="{{route('activity.store')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <div class="row">
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" type="text" name="name" placeholder="Nova Atividade..."/>
                                                                    </div>
                                                                    <input type="hidden" name="id_dev" value="{{$development->id}}"/>
                                                                    <div class="col-md-2">
                                                                        <button type="submit" style="margin: 0;" class="btn btn-success"><i class="nc-icon nc-simple-add"></i></button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table">
                                                                <table class="table">
                                                                    <tbody>
                                                                    @foreach(\App\ActivitiesModel::all()->where('id_dev',$development->id) as $activity)
                                                                        <tr>
                                                                            <td>
                                                                                @if($activity->status==1)
                                                                                    <i style="font-size: 20px; color: green" class="nc-icon nc-check-2"></i>
                                                                                @endif
                                                                                <strong>{{$activity->name}}</strong><br>
                                                                                {{\Carbon\Carbon::parse($activity->created_at)->format('d/m/Y - H:i')}}
                                                                            </td>
                                                                            <td>
                                                                                <a class="float-right" href="{{route('activity.remover', ['$id'=> $activity->id])}}" title="Excluir" style="color: red; margin: 3px"><i style="font-size: 20px; color: red" class="nc-icon nc-simple-remove"></i></a>
                                                                                @if($activity->status!=1)
                                                                                <a class="float-right" href="{{route('activity.resolvido', ['$id'=> $activity->id])}}" title="Concluído" style="color: green; margin: 3px"><i style="font-size: 20px; color: green" class="nc-icon nc-check-2"></i></a>
                                                                                    @endif
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
