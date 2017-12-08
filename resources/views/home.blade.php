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

                                                <p>
                                                    <button type="button" class="btn btn-info" onclick="reverseGeocodeAddress({{ $data->id }} )">Ocen</button>
                                                </p>

                                            </div>
                                            <div class="col-md-4"><a href="#">
                                                    <img class="media-object"
                                                         src="{{ asset('storage/image/entity/'.$data->thumbnail) }}"
                                                         alt="Kurt">
                                                </a></div>


                                        </div>
                                    </div>


                                    <div class="entity-right">
                                        <div class="entity-title">{{ $data->title }}</div>
                                        <div class="entity-description">
                                            {{ $data->description }}
                                            <a href="{{  '/entity/' . $data->id }}">
                                                <div class="entity-info"> komentarze / Zobacz wiecej</div>
                                            </a>
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
