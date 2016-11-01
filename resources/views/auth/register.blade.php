@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <!-- フォーム部分の呼出 -->
                    {!! Form::open(['url' => 'register']) !!}
                        @include('auth.form', ['submitButton' => 'Register'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
