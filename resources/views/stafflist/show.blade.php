@extends('stafflist.layout')

@section('content')
<table class="table">
    <caption>Staff detail</caption>
    <tbody>
        <tr>
            <th>社員番号</th><td>{{ $staff->staff_no }}</td>
        </tr>
        <tr>
            <th>名前</th><td>{{ $staff->name }}</td>
        </tr>
        <tr>
            <th>部署</th><td>{{ $department[$staff->department] }}</td>
        </tr>
        <tr>
            <th>性別</th><td>{{ $sex[$staff->sex] }}</td>
        </tr>
        <tr><td colspan="2">
        {!! link_to('staff', '戻る', ['class' => 'btn btn-primary']) !!}

        {!! link_to(action('StafflistController@edit', [$staff->id]), '編集', ['class' => 'btn btn-primary']) !!}
        </td></tr>
        <tr><td colspan="2">
        {!! Form::open(['method' => 'DELETE', 'url' => ['staff', $staff->id]]) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        </td></tr>
    </tbody>
</table>
@endsection