@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Twoje konwersacje:</div>

                    @foreach($messages as $message)
                    <div class="messages">
                        <a href="/messages/{{ $message->id }}">
                        <div class="messages-left"><img class="media-object"
                                                        src="{{ asset('image/'.$message->avatar) }}"
                                                        alt="Kurt"></div>
                        <div class="messages-right">Konwersacja z @ {{ $message->name }}</div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
