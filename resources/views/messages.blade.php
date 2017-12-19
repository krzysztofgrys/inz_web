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
                    {{ var_dump($message) }}
                    @if($message->receiver_id == Auth::user()->user->user->id )
                        <div class="messages">
                            <a href="/messages/show/{{ $message->sender_id }}">
                                <div class="messages-left"><img class="media-object"
                                                                src="{{ asset('storage/image/avatars/'.$message->avatar) }}"

                                                                alt="Kurt"></div>
                                <div class="messages-right">Konwersacja z @ {{ $message->sender_name }}</div>
                            </a>
                        </div>
                    @else
                        <div class="messages">
                            <a href="/messages/show/{{ $message->receiver_id }}">
                                <div class="messages-left"><img class="media-object"
                                                                src="{{ asset('storage/image/avatars/'.$message->avatar) }}"
                                                                alt="Kurt"></div>
                                <div class="messages-right">Konwersacja z @ {{ $message->receiver_name }}</div>
                            </a>
                        </div>


                    @endif

                @endforeach

            </div>
        </div>
    </div>

@endsection
