@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Edytuj wpis</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('saveEditedEndity', $data->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Tytuł</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $data->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label">Opis</label>

                            <div class="col-md-8">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $data->description }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                            <label for="media" class="col-md-2 control-label">Miniaturka:</label>

                            <div class="col-md-8">
                                <img class="media-object"
                                     src="{{ asset('storage/image/entity/'.$data->thumbnail) }}"
                                     alt="Kurt">
                                <br>
                                <input id="thumbnail" type="file" class="form-control" name="thumbnail" accept="image/*"  >

                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-2 control-label">Url:</label>

                            <div class="col-md-8">
                                <input id="url" type="url" class="form-control" name="url" placeholder=" http://www.google.com" value="{{ $data->url }} " required>
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href ='./entity' class="btn btn-danger">
                                    Anuluj
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Edytuj
                                </button>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

