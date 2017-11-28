@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">

                    <div class="panel-heading">Konwersacja z @ {{ $receiver->name }}</div>

                    @foreach($messages as $message)
                        <div class="message">
                            @if($message->receiver_id == $receiver->id)
                                <div class="message-receiver">
                                    RECEIVER

                                </div>

                            @else

                                <div class="message-sender">
                                    SENDER

                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>


                <div class="panel panel-default">

                    <div class="panel-heading">Odpowiedz: </div>
                    <div class="panel-body">
                        <div class="entity">
                            <div class="entity-left">
                                <div class="row">
                                    <div class="col-md-4"><a href="#">
                                            <img class="media-object"
                                                 src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                 alt="Kurt">
                                        </a></div>
                                </div>
                            </div>
                            <div class="entity-right">
                                <textarea class="form-control" rows="3" id="comment"></textarea>
                                <div class="entity-info">
                                    <button type="button" class="btn btn-primary"> Dodaj</button>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
