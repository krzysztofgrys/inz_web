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
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Szukaj..." autocomplete="off" required >
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
                                 <p>{{ dd($entry) }}</p>

                            @endforeach

                        </div>

                    </div>
                </div>

            @endif
        </div>
    </div>

@endsection
