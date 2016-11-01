@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <!-- フォーム部分の呼出 -->
                    {!! Form::model( $user, ['method' => 'POST', 'url' => ['user', $user->id]]) !!}
                        @include('auth.form', ['submitButton' => 'Edit'])
                    {!! Form::close() !!}
                    <div class="row form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::open(['method' => 'DELETE', 'url' => ['user', $user->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
