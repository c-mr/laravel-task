<!-- 共通パーツ　登録・編集フォーム -->

<!-- UsersのシリアルIDも保存する -->
{{Form::hidden('user_id', Auth::user()->id)}}
<div class="form-group{{ $errors->has('measure_at') ? ' has-error' : '' }}">
    {!! Form::label('measure_at','Measure date', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
    {!! Form::input('date', 'measure_at', $measure_at, ['class' => 'form-control']) !!}

        @if ($errors->has('measure_at'))
            <span class="help-block">
                <strong>{{ $errors->first('measure_at') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bodyweight') ? ' has-error' : '' }}">
    {!! Form::label('bodyweight','Current Weight', ['class' => 'col-md-4 control-label'] ) !!}

    <div class="col-md-6">
    {!! Form::text('bodyweight', null, ['class' => 'form-control']) !!}

        @if ($errors->has('bodyweight'))
            <span class="help-block">
                <strong>{{ $errors->first('bodyweight') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>