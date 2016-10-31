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
                            <tr>
                                <th colspan="2">Today</th>
                            </tr>
                            <tr>
                                <th>Measure date</th>
                                <td>{!! date('Y/m/d', strtotime($bodyweight->measure_at)) !!}</td>
                            </tr>
                            <tr>
                                <th>Body Weight</th>
                                <td>{!! $bodyweight->bodyweight !!}kg</td>
                            </tr>

                            <!-- 過去データが無ければ表示しない // -->
                            @if(!empty($bodyweight_prev))
                            <tr>
                                <th colspan="2">previous</th>
                            </tr>
                            <tr>
                                <th>Measure date</th>
                                <td>{!! date('Y/m/d', strtotime($bodyweight_prev->measure_at)) !!}</td>
                            </tr>
                            <tr>
                                <th>Body Weight</th>
                                <td>{!! $bodyweight_prev->bodyweight !!}kg</td>
                            </tr>
                            <tr>
                                <th colspan="2">Diff</th>
                            </tr>
                            <tr>
                                <th>Difference.</th>
                                <td>{!! $bodyweight->bodyweight_diff <= 0 ? $bodyweight->bodyweight_diff."kg" : "+".$bodyweight->bodyweight_diff."kg" !!}</td>
                            </tr>
                            <tr>
                                @if ($bodyweight->bodyweight_diff == 0)
                                <td colspan="2" class="info text-center">かわらん</td>
                                @elseif($bodyweight->bodyweight_diff > 0)
                                <td colspan="2" class="warning text-center">ふえた</td>
                                @elseif($bodyweight->bodyweight_diff < 0)
                                <td colspan="2" class="success text-center">へった</td>
                                @endif
                            </tr>
                            @endif
                            <!-- 過去データが無ければ表示しない ここまで // -->

                            <tr>
                                <td colspan="2">
                                    <!-- 一覧に戻るリンクボタン -->
                                    {!! link_to('bodyweights', 'Back', ['class' => 'btn btn-primary']) !!} {!! link_to(action('BodyweightsController@edit', [$bodyweight->id]), 'Edit', ['class' => 'btn btn-primary']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['bodyweights', $bodyweight->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
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
