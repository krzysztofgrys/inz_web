@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Szukaj</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <form class="form-horizontal" method="POST" action="{{ route('searchPhase') }}">

                                <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">

                                    <div class="input-group">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Szukaj..." autocomplete="off" required>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <span class="input-group-btn"><button class="btn btn-primary" type="submit">Szukaj</button></span>
                                    </div>
                                </div>

                            </form>
                            <p></p>

                        </div>

                        <div class="col-md-4 col-md-offset-4">
                            <p class="text-info ">Wpisz <code>@</code> aby wyszukać użytkownika np.: <code>@admin</code></p>

                        </div>
                    </div>
                </div>
            </div>


            @if(!empty($data->users))
                <div class="panel panel-default">
                    <div class="panel-heading">Znalezieni użytkownicy:</div>

                    <div class="panel-body">

                        @foreach($data->users as $user)
                            <a href="/profile/{{ $user->id }} "><p>{{$user->name}}</p></a>
                        @endforeach

                    </div>
                </div>

            @endif

            @if(!empty($data->entries))
                <div class="panel panel-default">
                    <div class="panel-heading">Znalezione wpisy:</div>

                    <div class="panel-body">

                        <div class="panel-body">
                            @foreach($data->entries as $entry)
                                <div class="entity">
                                    <div class="entity-left">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="circle"><i class="fa fa-btc"></i>{{ $entry->rating }}</div>
                                            </div>
                                            <a href="{{  '/entity/' . $entry->id }}">
                                                <div class="col-md-4">
                                                    <img class="media-object"
                                                         src="{{ asset('storage/image/entity/'.$entry->thumbnail) }}"
                                                         alt="thumbnail">
                                                </div>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="entity-right">
                                        <a href="{{  '/entity/' . $entry->id }}">
                                            <div class="entity-title">
                                                 <?php
                                                echo Layout::highlight($entry->title, $searched);
                                                ?>
                                            </div>
                                        </a>
                                        <div class="entity-description">
                                            <a href="{{  '/entity/' . $entry->id }}">
                                                <?php
                                                echo Layout::highlight($entry->description, $searched);
                                                ?>
                                            </a>
                                            {{--<div class="entity-info">--}}
                                            <div class="entity-info-left">
                                                <a href="{{  '/profile/' . $entry->user_id }}">
                                                    <i class="fa fa-user"> dodał: </i>
                                                </a>
                                                <strong> | </strong>
                                                <i class="fa fa-calendar-check-o"> {{ $entry->created_at }}</i>

                                                <strong> | </strong>
                                                <a href="{{  '/entity/' . $entry->id }}">
                                                    <i class="fa fa-globe"> domena:
                                                        youtube.com</i>
                                                </a>
                                                <strong> | </strong>
                                                <a href="{{  '/entity/' . $entry->id }}">
                                                    <i class="fa fa-comment"> zobacz komentarze</i>
                                                </a>

                                            </div>
                                            {{--</div>--}}
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        </div>

                    </div>
                </div>

            @endif
        </div>
    </div>

@endsection
