@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading">{{ $data->title }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="entity">
                        <div class="entity-left">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>
                                    <div class="circle"><span><i class="fa fa-btc"></i> {{ $data->rating }}</span></div>
                                    </p>
                                    <p>PODARUJ</p>
                                </div>
                                <div class="col-md-4"><a href="#">
                                        <img class="media-object"
                                             src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                             alt="Kurt">
                                    </a></div>


                            </div>
                        </div>

                        <a href="#">

                            <div class="entity-right">
                                <div class="entity-title">{{ $data->title }}
                                </div>
                                <div class="entity-description">
                                    {{ $data->description }}
                                    <div class="entity-info"> komentarze / Zobacz wiecej</div>
                                </div>
                        </a>

                    </div>


                </div>
            </div>
            <br>

        </div>
    </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Komentarze:</div>
        @if (!empty($comments))
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach($comments as $comment)
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

                        <a href="#">

                            <div class="entity-right">
                                <div class="entity-title">{{ $comment->comments }}
                                </div>
                                <div class="entity-description">
                                    <div class="entity-info"> komentarze / Zobacz wiecej</div>
                                </div>
                            </div>
                        </a>

                    </div>

                @endforeach
            </div>

        @endif
    </div>
    @auth
        <div class="panel panel-default">
            <div class="panel-heading">Dodaj komentarz:</div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('addComment', $data->entity_id ) }}">
                    {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label for="body" class="col-md-2 control-label"><img class="media-object"
                                                                              src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                                              alt="Kurt"></label>

                        <div class="col-md-8">
                            <textarea id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}"></textarea>
                            {{--<input id="receiver" name="receiver" type="hidden" value="{{ $receiver->name }}">--}}

                            @if ($errors->has('comment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-9">
                            <button type="submit" class="btn btn-primary">
                                Didaj
                            </button>
                        </div>
                    </div>

                </form>

            </div>

    @endauth

@endsection
