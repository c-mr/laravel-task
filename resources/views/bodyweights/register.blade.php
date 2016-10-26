@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Today's weight registration.</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/bodyweights') }}">

                    <!-- フォームのトークン(これがないとSubmitできない) -->
                    {{ csrf_field() }}

                    <!-- UsersのシリアルIDも保存する -->
                    <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">

                        <div class="form-group{{ $errors->has('measure_at') ? ' has-error' : '' }}">
                            <label for="measure_at" class="col-md-4 control-label">Measure date</label>
                            <div class="col-md-6">
                                <input id="measure_at" type="date" class="form-control" name="measure_at" value="{{ old('measure_at') }}">

                                @if ($errors->has('measure_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('measure_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bodyweight') ? ' has-error' : '' }}">
                            <label for="bodyweight" class="col-md-4 control-label">Current Weight</label>

                            <div class="col-md-6">
                                <input id="bodyweight" type="text" class="form-control" name="bodyweight" value="{{ old('bodyweight') }}">

                                @if ($errors->has('bodyweight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bodyweight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
