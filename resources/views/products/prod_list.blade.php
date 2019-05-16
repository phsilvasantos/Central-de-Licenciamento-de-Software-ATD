@extends('layouts.app')
@section('content')
    <script type="application/javascript" language="javascript">
        document.getElementById('products').className = 'active';
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title float-left">Sistemas <strong>ATD</strong> Desenvolvidos</h5>
                        <a href="{{route('products.new')}}" class="btn btn-primary float-right" style="color: white;"><i style="font-size: 10px" class="nc-icon nc-simple-add"></i>&nbsp;&nbsp;Novo</a>
                    </div>
                    <div class="card-body all-icons">
                        <div id="icons-wrapper">
                            <section>
                                <ul>
                                    @foreach($products as $product)
                                    <a href="{{route('products.view', ['$id'=> $product->id])}}">
                                        <li>
                                            <i class="nc-icon nc-box-2"></i>
                                            <p><strong>{{$product->name}}</strong></p>
                                        </li>
                                    </a>
                                    @endforeach
                                    <!-- list of icons here with the proper class-->
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
