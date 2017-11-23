@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <div class="media">
                            <div class="media-left">


                            </div>

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

                                <a href = "#">

                                <div class="entity-right"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris.
                                    <div class ="entity-info"> komentarze / Zobacz wiecej</div>
                                </div>
                                </a>

                            </div>
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

                                <div class="entity-right"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris.</div>


                            </div>
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

                                <div class="entity-right"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris.</div>


                            </div>
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

                                <div class="entity-right"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris.</div>


                            </div>
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

                                <div class="entity-right"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris.</div>


                            </div>
                        </div>
                    </div>
                    @foreach($datas as $data)

                        <p>{{ $data->id }}</p>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
