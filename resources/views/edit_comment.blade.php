@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Edytuj komentarz</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                          action="{{ route('saveEditedComment', [$entity_id,$comment_id ]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-2 control-label">Opis</label>

                            <div class="col-md-8">
                                <textarea maxlength="500" style="width: 100%; height: 100%;" id="comment" class="form-control" rows="5"
                                          name="comment">{{ $data }}</textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href='./entity' class="btn btn-danger">
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

