@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Today's weight details.</div>
                <div class="panel-body">

                <table class="table table-bordered">
                    <tbody>
                        <tr><th colspan="2">Today</th></tr>
                        <tr><th>Measure date</th><td>{!! date('Y/m/d', strtotime($bodyweight->measure_at)) !!}</td></tr>
                        <tr><th>Body Weight</th><td>{!! $bodyweight->bodyweight !!}kg</td></tr>
                        <tr><th colspan="2">previous</th></tr>
                        <tr><th>Measure date</th><td>{!! date('Y/m/d', strtotime($bodyweight_prev->measure_at)) !!}</td></tr>
                        <tr><th>Body Weight</th><td>{!! $bodyweight_prev->bodyweight !!}kg</td></tr>
                        <tr><th colspan="2">Diff</th></tr>
                        <tr><th>Difference.</th><td>{!! $bodyweight_diff = $bodyweight->bodyweight - $bodyweight_prev->bodyweight !!}</td></tr>
                        <tr>
                            @if ($bodyweight->bodyweight == $bodyweight_prev->bodyweight)
                                <td colspan="2" class="info text-center">かわらん</td>
                            @elseif($bodyweight->bodyweight > $bodyweight_prev->bodyweight)
                                <td colspan="2" class="warning text-center">ふえた</td>
                            @elseif($bodyweight->bodyweight < $bodyweight_prev->bodyweight)
                                <td colspan="2" class="success text-center">へった</td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="2">
                            <!-- 一覧に戻るリンクボタン -->
                            {!! link_to('bodyweights', 'Back', ['class' => 'btn btn-primary']) !!}

                            {!! link_to(action('BodyweightsController@edit', [$bodyweight->id]), 'Edit', ['class' => 'btn btn-primary']) !!}
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form method="POST" role="form" action="{{ url('/bodyweights/$bodyweight->id') }}" accept-charset="UTF-8">
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
