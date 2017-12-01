<div class="alert alert-{{ $type }} alert-dismissable fade in">
    <div class="alert-close" onclick="$('.alert').hide()">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>@if(isset($title))
                {!! $title  !!}
            @endif</strong> @if(isset($content))
            {!! $content  !!}
        @endif
    </div>
</div>