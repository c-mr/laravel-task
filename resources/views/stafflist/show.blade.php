@extends('stafflist.layout')

@section('content')
<table>
    <caption>Staff detail</caption>
    <tbody>
        <tr>
            <th>社員番号</th><td>{{ $staff->staff_no }}</td>
        </tr>
        <tr>
            <th>名前</th><td>{{ $staff->name }}</td>
        </tr>
        <tr>
            <th>部署</th><td>{{ Config::get('original.busho')[$staff->busho] }}</td>
        </tr>
        <tr>
            <th>性別</th><td>{{ $staff->sex }}</td>
        </tr>
    </tbody>
</table>
@endsection