{!! Form::open(['route' => 'registro', 'class' => 'form']) !!}

<div class="form-group">
    <label>{{ trans('form.label.name') }}</label>
    {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    <label>{{ trans('form.label.email') }}</label>
    {!! Form::email('email', '', ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    <label>{{ trans('form.label.password') }}</label>
    {!! Form::password('password', ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    <label>{{ trans('form.label.password_confirmation') }}</label>
    {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
</div>

<div>

</div>
{!! Form::close() !!}
