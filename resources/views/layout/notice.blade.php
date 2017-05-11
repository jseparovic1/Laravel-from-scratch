@if($message = session('message'))
    <div class="alert alert-success notice">
        {{ $message }}
    </div>
@endif