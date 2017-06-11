@if(!empty($errors))
    @foreach ($errors->all() as $error)
        <div class="panel panel-warning">
            <div class="panel-heading">
                <i class="fa fa-warning"></i> Ошибка
            </div>
            <div class="panel-body">
                <p>{!! $error !!}</p>
            </div>
        </div>
    @endforeach
@endif

@if (session('message'))
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-info-circle"></i> Сообщение!
        </div>
        <div class="panel-body">
            <p>{!! session('message') !!}</p>
        </div>
    </div>
@endif
@if (!empty($message))
    <div class="panel panel-danger">
        <div class="panel-heading">
            <i class="fa fa-info-circle"></i> Сообщение!
        </div>
        <div class="panel-body">
            <p>{!! $message !!}</p>
        </div>
    </div>
@endif