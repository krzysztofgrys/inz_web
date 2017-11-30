@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Najpopularniejsze</div>

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

                                                        <p><button type="button" class="btn btn-info" onclick="reverseGeocodeAddress({{ $data->id }} )">Ocen</button></p>

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
    </div>
@endsection
