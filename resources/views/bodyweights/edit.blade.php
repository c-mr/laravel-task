@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Today's weight registration.</div>
                <div class="panel-body">

                    <!-- フォーム部分の呼出 -->
                    {!! Form::model( $bodyweight, ['method' => 'POST', 'url' => ['bodyweights', $bodyweight->id], 'name'=>'bodyweight_form']) !!}
                        @include('bodyweights.form', ['measure_at' => date('Y/m/d', strtotime($bodyweight->measure_at)), 'submitButton' => 'Edit'])
                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
