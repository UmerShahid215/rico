@if(Session::has('message'))
<div class="alert alert-{{ Session::get('class') ?? 'info'}}" role="alert">
    <div class="alert-text">{{ Session::get('message') }}</div>
</div>
@endif
