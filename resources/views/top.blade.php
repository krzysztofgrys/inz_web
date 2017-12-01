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
                        <h1>Brak danych, Zmień zakres</h1>
                        <h3>

                        </h3>
                    @else
                        <div class="media">

                            @foreach($datas as $data)

                                <div class="entity">
                                    <div class="entity-left">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="circle"><i class="fa fa-btc"></i>{{ $data->rating }}</div>

                                                <p>
                                                    <button type="button" class="btn btn-info" onclick="reverseGeocodeAddress({{ $data->id }} )">Ocen</button>
                                                </p>

                                            </div>
                                            <div class="col-md-4"><a href="#">
                                                    <img class="media-object"
                                                         src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                         alt="Kurt">
                                                </a></div>


                                        </div>
                                    </div>

                                    <a href="{{  '/entity/' . $data->id }}">

                                        <div class="entity-right">
                                            <div class="entity-title">{{ $data->title }}</div>
                                            <div class="entity-description">
                                                {{ $data->description }}
                                                <div class="entity-info"> komentarze / Zobacz wiecej</div>
                                            </div>
                                        </div>
                                    </a>
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
