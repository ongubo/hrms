<div class="col-sm-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success outline-2x" role="alert">
        <strong><i class='fa fa-check-circle fa-3x'></i>
            {{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-info outline-2x" role="alert">
        <strong><i class='fa fa-info-circle fa-3x'></i>
            {{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger outline-2x" role="alert">
        <strong><i class='fa fa-exclamation-triangle fa-3x'></i>
            {{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger outline-2x" role="alert">
        <i class="icon fa fa-ban"></i> Errors !
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif
</div>