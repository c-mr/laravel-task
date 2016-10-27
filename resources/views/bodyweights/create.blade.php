@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Today's weight registration.</div>
                <div class="panel-body">

                    <!-- フォーム部分の呼出 -->
                    {!! Form::open(['url' => 'bodyweights', 'name'=>'bodyweight_form']) !!}
                        @include('bodyweights.form', ['measure_at' => date('Y/m/d'), 'submitButton' => 'Register'])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
