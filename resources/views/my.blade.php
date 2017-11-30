@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold"> {{$user->name }}
                        <div class="text-right pull-right"><a href="#" class="btn btn-success btn-xs">Edytuj Profil</a></div>
                    </div>


                    <div class="panel-body">


                        <div class="row">
                            <div class="col-sm-2"><img class="media-object"
                                                       src="{{ asset('image/'.$user->avatar) }}"
                                                       alt="Kurt"></div>
                            <div class="col-sm-5">
                                <p class="font-weight-bold"> Imię i Nazwisko:  {{ $user->name }}</p>
                                <p class="font-weight-bold"> Miasto:  {{ $user->city }}</p>


                            </div>
                            <div class="col-sm-5">
                                <p class="font-weight-bold"> Wiek:  {{ $user->date_of_birth }}</p>
                                <p class="font-weight-bold"> Dołączył:  {{ $user->created_at }}</p>
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
                            @foreach($userEntities as $userEntity)
                                <div class="entity">
                                    <div class="entity-left">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="circle"><i class="fa fa-btc"></i>{{ $userEntity->rating }}</div>

                                                <p>
                                                    <button type="button" class="btn btn-info" onclick="reverseGeocodeAddress({{ $userEntity->id }} )">Ocen
                                                    </button>
                                                </p>

                                            </div>
                                            <div class="col-md-4"><a href="#">
                                                    <img class="media-object"
                                                         src="https://media.licdn.com/mpr/mpr/shrinknp_100_100/AAEAAQAAAAAAAAofAAAAJDVjNmI4NzcwLTA2NTktNDZhNS04MWNhLThkNWIwNGJkNGQyNw.png"
                                                         alt="Kurt">
                                                </a></div>


                                        </div>
                                    </div>

                                    <a href="{{  '/entity/' . $userEntity->id }}">

                                        <div class="entity-right">
                                            <div class="entity-title">{{ $userEntity->title }}</div>
                                            <div class="entity-description">
                                                {{ $userEntity->description }}
                                                <div class="entity-info"> komentarze / Zobacz wiecej</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach
                        </div>




                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
