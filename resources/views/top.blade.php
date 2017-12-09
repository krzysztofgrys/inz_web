@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Najpopularniejsze
                    <div class="text-right pull-right">
                        <a href="/top/6" class="btn btn-primary btn-xs">6 godzin</a>
                        <a href="/top/12" class="btn btn-primary btn-xs">12 godzin</a>
                        <a href="/top/24" class="btn btn-primary btn-xs">24 godziny</a>
                        <a href="/top/week" class="btn btn-primary btn-xs">tydzień</a>
                        <a href="/top/month" class="btn btn-primary btn-xs">Miesiac</a>
                        <a href="/top/year" class="btn btn-primary btn-xs">Rok</a>
                    </div>


                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (empty($datas))
                        <h5>Nic tu nie ma</h5>
                    @else
                        <div class="media">

                            @foreach($datas as $data)

                                <div class="entity">
                                    <div class="entity-left">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="circle"><i class="fa fa-btc"></i>{{ $data->rating }}</div>
                                            </div>
                                            <a href="{{  '/entity/' . $data->id }}">
                                                <div class="col-md-4">
                                                    <img class="media-object"
                                                         src="{{ asset('storage/image/entity/'.$data->thumbnail) }}"
                                                         alt="Kurt">
                                                </div>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="entity-right">
                                        <a href="{{  '/entity/' . $data->id }}">
                                            <div class="entity-title">{{ $data->title }}
                                            </div>
                                        </a>
                                        <div class="entity-description">
                                            <a href="{{  '/entity/' . $data->id }}">
                                                {{ $data->description }}
                                            </a>
                                            {{--<div class="entity-info">--}}
                                            <div class="entity-info-left">
                                                <a href="{{  '/profile/' . $data->user_id }}">
                                                    <i class="fa fa-user"> dodał: {{ '@'.$data->user_name }}</i>
                                                </a>
                                                <strong> | </strong>
                                                <i class="fa fa-calendar-check-o"> {{ $data->created_at->date }}</i>

                                                <strong> | </strong>
                                                <a href="{{  '/entity/' . $data->id }}">
                                                    <i class="fa fa-globe"> domena:
                                                        youtube.com</i>
                                                </a>
                                                <strong> | </strong>
                                                <a href="{{  '/entity/' . $data->id }}">
                                                    <i class="fa fa-comment"> zobacz komentarze</i>
                                                </a>

                                            </div>
                                            {{--</div>--}}
                                        </div>
                                    </div>

                                </div>

                            @endforeach


                        </div>

                    @endif


                </div>
            </div>
        </div>
    </div>

@endsection
