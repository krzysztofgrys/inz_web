@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Nowa wiadomość:</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('sendMessage') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="receiver" class="col-md-2 control-label">Odbiorca:</label>

                            <div class="col-md-8">
                                <input id="receiver" type="text" class="form-control autocomplete" name="receiver" value="{{ old('receiver') }}" required
                                       autofocus>

                                @if ($errors->has('receiver'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('receiver') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-2 control-label">Opis</label>

                            <div class="col-md-8">
                                <textarea id="body" type="text" class="form-control" name="body" value="{{ old('body') }}"></textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-9">
                                <button type="submit" class="btn btn-primary">
                                    Wyślij
                                </button>
                            </div>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>

@endsection
