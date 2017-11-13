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
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><div class="circle"><span><i class="fa fa-btc"></i>0</span></div></p>
                                            <p>UP</p>
                                            <p>DOWN</p>
                                        </div>
                                        <div class="col-md-1"><a href="#">
                                                <img class="media-object"
                                                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Canis_lupus.jpg/260px-Canis_lupus.jpg"
                                                     alt="Kurt">
                                            </a></div>


                                    </div>

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum</h4>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci.
                                    Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus
                                    id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non
                                    commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem
                                    turpis vitae mauris. Donec dapibus justo a elit semper, et scelerisque mauris ullamcorper. Maecenas blandit arcu nec euismod
                                    pellentesque. Fusce et imperdiet nisi, at suscipit sem. Aliquam pulvinar risus id cursus elementum. Nulla elementum placerat
                                    nibh, in dictum enim mollis non. Morbi vehicula eget est et tristique. Aenean condimentum augue id congue convallis.
                                    Phasellus congue non tellus nec pretium. Maecenas eu vulputate lacus, eget feugiat odio.
                                    <div class="clearfix"></div>
                                    <div class="btn-group" role="group" id="BegeniButonlari">
                                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                                    </div>
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
