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
                        <h5>Brak danych</h5>
                    @else
                        <div class="media">

                            @foreach($datas as $data)

                                <div class="entity">
                                    <div class="entity-left">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{  '/entity/' . $data->id.'/rate?dest=home' }}">
                                                    <div class="circle"><i class="fa fa-btc"></i>{{ $data->rating }}</div>
                                                </a>
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
                                                <i class="fa fa-calendar-check-o"> {{ $data->created_at }}</i>

                                                <strong> | </strong>
                                                <a href="{{  $data->url }}">
                                                    <i class="fa fa-globe"> domena:
                                                        {{ $data->domain }}</i>
                                                </a>
                                                <strong> | </strong>
                                                <a href="{{  '/entity/' . $data->id }}">
                                                    <i class="fa fa-comment">
                                                        @switch($data->comments)
                                                            @case(0)
                                                            Dodaj komentarz
                                                            @break
                                                            @case(1)
                                                            {{ $data->comments }} komentarz
                                                            @break
                                                            @case(2)
                                                            @case(3)
                                                            @case(4)
                                                            @case(5)
                                                            {{ $data->comments }} komentarze
                                                            @break
                                                            @default
                                                            {{ $data->comments }} komentarzy


                                                        @endSwitch


                                                    </i>
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
