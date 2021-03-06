@extends('layout')

@section('content')

<table class="table">
    <caption>Staff list</caption>
    <thead>
        <tr><th>&nbsp</th><th>社員番号</th><th>名前</th><th>部署</th><th>性別</th></tr>
    </thead>
    <tbody>

<!-- DBから読み込んで表示 -->
@foreach($stafflist as $staff)
        <tr>
            <!-- 詳細画面へのリンク -->
            <td><a href="{{ url('staff', $staff->id) }}">Detail</a></td>
            <td>{{ $staff->staff_no }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ $department[$staff->department] }}</td>
            <td>{{ $sex[$staff->sex] }}</td>
        </tr>
@endforeach

    </tbody>
</table>

<!-- 新規登録リンクボタン -->
{!! link_to('staff/create', '新規作成', ['class' => 'btn btn-primary']) !!}

@endsection