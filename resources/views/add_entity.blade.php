@extends('layouts.app')
<script>
    function setValue($asd) {
        console.log($asd);
        $('input[name="selected_type"]').val($asd);
    }
</script>
@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj Wpis</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('addEntity') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Tytuł</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

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
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

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
                                <input id="thumbnail" type="file" class="form-control" name="thumbnail" accept="image/*" required >

                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="media" class="col-md-2 control-label">Wybierz typ wpisu:</label>
                            <div class="col-md-8">
                                <ul class="nav nav-pills mb-2 " id="type" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="url_type" data-toggle="pill" href="#pills-profile" role="tab"
                                           aria-controls="pills-profile" aria-selected="false" onclick="setValue('url')">URL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="own_type" data-toggle="pill" href="#pills-contact" role="tab"
                                           aria-controls="pills-contact" aria-selected="false" onclick="setValue('own')">Własna Treść</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                    <label for="url" class="col-md-2 control-label">Url:</label>

                                    <div class="col-md-8">
                                        <input id="url" type="url" class="form-control" name="url">

                                        @if ($errors->has('url'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                                <div class="form-group{{ $errors->has('own_input') ? ' has-error' : '' }}">
                                    <label for="own_input" class="col-md-2 control-label">Wpisz:</label>

                                    <div class="col-md-8">
                                        <textarea id="own" cols="100" rows="5" class="form-control" name="own_input"></textarea>

                                        @if ($errors->has('own_input'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('own_input') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            {{--<label for="media" class="col-md-2 control-label">Miniaturka:</label>--}}

                            <div class="col-md-8">
                                <input id="selected_type" type="hidden" class="form-control" name="selected_type" required>

                                @if ($errors->has('selected_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('selected_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

