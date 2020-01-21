@if( Session::has( 'success' ))
<div class="alert alert-success alert-dismissible fade show">
    {{ Session::get( 'success' ) }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif( Session::has( 'errors' ))
<div class="alert alert-danger alert-dismissible fade show">
    @foreach ($errors->all() as $error)
    {{ $error }} <br>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif