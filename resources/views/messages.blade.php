@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Twoje konwersacje:
                    <div class="text-right pull-right"><a href="./messages/new" class="btn btn-info btn-xs">Nowa Wiadomość</a></div>
                </div>

                @if(empty($messages))

                    <h5>Nic tu nie ma.</h5>
                    <a href="./messages/new"><h3>Zacznij swoją pierwsza konwersacje!</h3></a>

                @endif
                @foreach($messages as $message)
                    @if($message->id != Auth::user()->user->user->id )
                        <div class="messages">
                            <a href="/messages/show/{{ $message->id }}">
                                <div class="messages-left"><img class="media-object"
                                                                src="{{ asset('image/'.$message->avatar) }}"
                                                                alt="Kurt"></div>
                                <div class="messages-right">Konwersacja z @ {{ $message->name }}</div>
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

@endsection
