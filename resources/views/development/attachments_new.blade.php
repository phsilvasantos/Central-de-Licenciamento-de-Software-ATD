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
                        <h5 class="card-title">Upload de <strong>Anexo</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('attachments.upload')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome da Versão</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_dev" value="{{$id}}">
                            <div class="row">
                                <div class="col-md-12">
                                        <input type="file" class="" name="arquivo" id="arq">
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
