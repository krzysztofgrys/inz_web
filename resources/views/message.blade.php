@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading">Konwersacja z @ {{ $receiver->name }}</div>

                @foreach($messages as $message)
                    <div class="message">
                        @if($message->receiver_id == $receiver->id)
                            <div class="message-receiver">
                                {{ $message->message }}
                            </div>
                        @else
                            <div class="message-sender">
                                {{ $message->message }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="panel panel-default">

                <div class="panel-heading">Odpowiedz:</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('sendMessage') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-2 control-label"><img class="media-object"
                                                                                  src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                                                  alt="Kurt"></label>

                            <div class="col-md-8">
                                <textarea id="body" type="text" class="form-control" name="body" value="{{ old('body') }}"></textarea>
                                <input id="receiver" name="receiver" type="hidden" value="{{ $receiver->name }}">

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
