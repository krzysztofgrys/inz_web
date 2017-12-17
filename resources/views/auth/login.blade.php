@extends('layouts.app')

@section('content')
    {{--@if(isset($error))--}}
        {{--<div class="alert alert-{{ $type }} alert-dismissable fade in">--}}
            {{--<div class="alert-close" onclick="$('.alert').hide()">--}}
                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                {{--<strong>Błąd!</strong>--}}
                {{--Niepoprawna nazwa użytkownika lub hasło--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--@endif--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Hasło</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary ">
                                        Zaloguj
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="col text-center">
                            <p><strong>Lub zaloguj przy pomocy:</strong></p>
                            <a href="{{ url('/login/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                            <a href="{{ url('/login/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                            <a href="{{ url('/login/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="{{ url('/login/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
