<div class="clear-both"></div>
@if(!empty(session('error')))
<div class="alert alert-danger" role="alert">
{{ session('error') }}
</div>
@endif