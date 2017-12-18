@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading">{{ $data->title }}
                    @auth
                        @if($data->user_id == Auth::user()->user->user->id)
                            <div class="text-right pull-right">
                                <a href="/entity/{{ $data->id }}/edit" class="btn btn-info btn-xs">Edytuj</a>
                                <a href="/entity/{{ $data->id }}/delete" class="btn btn-danger btn-xs">Usuń</a>

                            </div>
                        @endif
                    @endauth
                </div>

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
                                    <div class="circle"><i class="fa fa-btc"></i>{{ $data->rating }}</div>
                                </div>
                                <a href="{{ $data->url}}">
                                    <div class="col-md-4">
                                        <img class="media-object"
                                             src="{{ asset('storage/image/entity/'.$data->thumbnail) }}"
                                             alt="Kurt">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="entity-right">
                            <a href="{{  $data->url}}">
                                <div class="entity-title">{{ $data->title }}
                                </div>
                            </a>
                            <div class="entity-description">
                                <a href="{{ $data->url}}">
                                    {{ $data->description }}
                                </a>
                                {{--<div class="entity-info">--}}
                                <div class="entity-info-left">
                                    <a href="{{  '/profile/' . $data->user_id }}">
                                        <i class="fa fa-user"> dodał: {{ '@'.$data->user_name }}</i>
                                    </a>
                                    <strong> | </strong>
                                    <i class="fa fa-calendar-check-o"> {{ $data->created_at }}</i>

                                    <strong> | </strong>
                                    <a href="{{  $data->url }}">
                                        <i class="fa fa-globe"> domena:
                                            {{ $data->domain }}</i>
                                    </a>
                                </div>
                                {{--</div>--}}
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Komentarze {{ $comments_count.':' }}  </div>
        @if (!empty($comments))
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach($comments as $comment)

                    @if(isset($edit) && $comment->id == $edit)

                        TEN

                    @else
                        <div class="entity">
                            <div class="entity-left">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="media-object"
                                             src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                             alt="Kurt">
                                    </div>
                                </div>
                            </div>

                            <div class="entity-right">
                                <div class="comment-info">
                                    <div class="comment-info-text">
                                        Dodał: <a href=" {{ '/profile/'.$comment->user_id }}  ">{{ $comment->name }}</a><strong>
                                            | </strong> {{ $comment->created_at }}


                                        <div class="text-right pull-right">
                                            <a href="/entity/{{request()->route('id')}}/comment/{{ $comment->id }}/edit?comment={{ $comment->comments }}" class="btn btn-info btn-xs">Edytuj</a>
                                            <a href="/entity/{{request()->route('id')}}/comment/{{ $comment->id }}/delete"
                                               class="btn btn-danger btn-xs">Usuń</a>

                                        </div>
                                    </div>

                                </div>
                                <div class="comment-body">
                                    {{ $comment->comments }}
                                </div>
                            </div>
                        </div>

                    @endif



                @endforeach
            </div>

        @endif
    </div>
    @auth
        <div class="panel panel-default">
            <div class="panel-heading">Dodaj komentarz:</div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('addComment', $data->id ) }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label for="body" class="col-md-2 control-label"><img class="media-object"
                                                                              src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                                              alt="Kurt"></label>

                        <div class="col-md-8">
                            <textarea id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}" required></textarea>
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
                                Dodaj
                            </button>
                        </div>
                    </div>

                </form>

            </div>

    @endauth

@endsection
