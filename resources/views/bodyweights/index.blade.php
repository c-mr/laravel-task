@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The history of {{ Auth::user()->name }} body weight.</div>
                <div class="panel-body">

                <!-- 新規登録リンクボタン -->
                {!! link_to('bodyweights/create', 'Register', ['class' => 'btn btn-primary']) !!}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Measure date</th><th>Body Weight</th><th>Difference.</th><th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bodyweights as $bodyweight)
                        <tr>
                            <td>{!! date('Y/m/d', strtotime($bodyweight->measure_at)) !!}</td>
                            <td>{!! $bodyweight->bodyweight !!}kg</td>
                            <td>{!! $bodyweight->bodyweight_diff <= 0 ? $bodyweight->bodyweight_diff : "+".$bodyweight->bodyweight_diff !!}
                            {{ $bodyweight->bodyweight_diff === NULL ? "" : "kg" }}</td>
                            <td><a href="{{ url('bodyweights', $bodyweight->id) }}">Detail</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- ページネーションのリンク遷移分 -->
                {{ $bodyweights->links() }}
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>
@endsection
