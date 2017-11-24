@extends('layouts.app')

@section('content')
    <div class="container">
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
                                            <div class="circle"><span><i class="fa fa-btc"></i>0</span></div>
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
            </div>
        </div>
    </div>
@endsection
