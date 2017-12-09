@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Strona Główna</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (empty($datas))
                        <h1>Brak danych</h1>
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

                            {{--</div>--}}
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
