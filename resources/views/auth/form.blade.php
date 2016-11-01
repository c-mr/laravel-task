<div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name','Name', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('text', 'name', null, ['id' => 'name', 'class' => 'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email','E-Mail Address', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('text', 'email', null, ['id' => 'email', 'class' => 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password','Password', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('password', 'password', null, ['id' => 'password', 'class' => 'form-control']) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {!! Form::label('password_confirm','Confirm Password', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('password', 'password_confirmation', null, ['id' => 'password_confirm', 'class' => 'form-control']) !!}

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group{{ $errors->has('bodyweight') ? ' has-error' : '' }}">
    {!! Form::label('bodyweight','Current Weight', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('text', 'bodyweight', null, ['id' => 'bodyweight', 'class' => 'form-control']) !!}

        @if ($errors->has('bodyweight'))
            <span class="help-block">
                <strong>{{ $errors->first('bodyweight') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group{{ $errors->has('bodyheight') ? ' has-error' : '' }}">
    {!! Form::label('bodyheight','Current Height', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
        {!! Form::input('text', 'bodyheight', null, ['id' => 'bodyheight', 'class' => 'form-control']) !!}

        @if ($errors->has('bodyheight'))
            <span class="help-block">
                <strong>{{ $errors->first('bodyheight') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>