@if (Session::has('message_info'))
    <div class="container">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Info</h5>
            {{ Session::get('message_info') }}
        </div>
    </div>
@endif

@if (Session::has('message_error'))
    <div class="container">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Erro</h5>
            {{ Session::get('message_error') }}
        </div>
    </div>
@endif
