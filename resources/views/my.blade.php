@extends('layouts.app')

@section('content')

    <div class="row">
        <img class="media-object"
             src="{{ $image }}"
             alt="Kurt">
        {{--@if(!isset($data->data))--}}
        {{--@include('common.flash', ['type' => 'info', 'content' => 'No images found.'])--}}
        {{--@endif--}}

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading font-weight-bold"> {{$user->name }}
                    <div class="text-right pull-right"><a href="/profile/{{$user->id }}/edit" class="btn btn-success btn-xs">Edytuj Profil</a></div>
                </div>

                <div class="panel-body">


                    <div class="row">
                        <div class="col-sm-2"><img class="media-object"
                                                   src="{{ asset('image/'.$user->avatar) }}"
                                                   alt="Kurt"></div>
                        <div class="col-sm-5">
                            <p class="font-weight-bold"> Imię i Nazwisko: {{ $user->fullname }}</p>
                            <p class="font-weight-bold"> Miasto: {{ $user->city }}</p>


                        </div>
                        <div class="col-sm-5">
                            <p class="font-weight-bold"> Wiek: {{ $user->date_of_birth }}</p>
                            <p class="font-weight-bold"> Dołączył: {{ $user->created_at }}</p>
                        </div>
                    </div>

                    <p>Opis:</p>
                    <p>{{ $user->description }}</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Posty użytkownika:</div>
                @if (!empty($userEntities))
                    <div class="panel-body">

                        @foreach($userEntities as $data)

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

@endsection
