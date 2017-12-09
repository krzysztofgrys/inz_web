@if(Session::has('success'))
    @include('common.flash', [
      'type' => 'success',
      'title' => Layout::title(Session::get('success')),
      'content' => Layout::content(Session::get('success'))
    ])
@endif
@if(Session::has('info'))
    @include('common.flash', [
      'type' => 'info',
      'title' => Layout::title(Session::get('info')),
      'content' => Layout::content(Session::get('info'))
    ])
@endif
@if(Session::has('warning'))
    @include('common.flash', [
      'type' => 'warning',
      'title' => Layout::title(Session::get('warning')),
      'content' => Layout::content(Session::get('warning'))
    ])
@endif
@if(Session::has('error'))
    @include('common.flash', [
      'type' => 'danger',
      'title' => Layout::title(Session::get('error')),
      'content' => Layout::content(Session::get('error'))
    ])
@endif

