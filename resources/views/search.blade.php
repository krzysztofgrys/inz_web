@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Szukaj</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="input-group">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Szukaj...">
                                <span class="input-group-btn">
                     <button class="btn btn-primary" type="button">Szukaj</button>
                    </span>
                            </div>
                            <p></p>

                        </div>

                        <div class="col-md-4 col-md-offset-4">
                            <p class="text-info ">Wpisz <code>@</code> aby wyszukać użytkownika np.: <code>@admin</code></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
