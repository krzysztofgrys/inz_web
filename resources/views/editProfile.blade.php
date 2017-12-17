@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading font-weight-bold"> {{$user->name }}</div>


                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('saveEditedProfile',$user->id ) }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-2"><img class="media-object"
                                                       src="{{ asset('image/'.$user->avatar) }}"
                                                       alt="Kurt">
                                <p> Zmien </p></div>
                            <div class="col-sm-5">

                                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                    <label for="fullname" class="col-md-2 control-label">Imię i Nazwisko:</label>

                                    <div class="col-md-8">
                                        <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $user->fullname}}" required autofocus>

                                        @if ($errors->has('fullname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city" class="col-md-2 control-label">Miasto:</label>

                                    <div class="col-md-8">
                                        <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" autofocus>

                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-5">
                                <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                    <label for="age" class="col-md-2 control-label">Wiek:</label>

                                    <div class="col-md-8">
                                        <input id="age" type="text" class="form-control" name="age" value="{{ $user->date_of_birth }}" autofocus>

                                        @if ($errors->has('age'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-2 control-label">Hasło:</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control" name="password" >

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-2 control-label">Powtórz Hasło:</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <p>Opis: (Maksymalnie 500 znaków)</p>

                        <p><textarea maxlength="500" style="width: 100%; height: 100%;" id="description" class="form-control" rows="5"
                                     name="description">{{ $user->description }}</textarea>
                        </p>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-9">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
