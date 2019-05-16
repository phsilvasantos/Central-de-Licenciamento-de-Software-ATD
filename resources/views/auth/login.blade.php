@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div style="width: 100%; padding: 20px" align="center">
                </div>
                <div class="card-header" align="center">
                    <h2 style="margin-bottom: 0px; font-size: 40px"><strong style="color:#941012">ATD</strong> Sistemas</h2>
                    <h5>www.atdsistemas.com.br</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">

                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>
<br>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0" align="right">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-default">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
