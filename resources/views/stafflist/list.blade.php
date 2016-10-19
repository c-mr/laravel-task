@extends('stafflist.layout')

@section('content')
<table>
    <caption>Staff list</caption>
    <thead>
        <tr>
            <th></th>
            <th>社員番号</th>
            <th>名前</th>
            <th>部門</th>
            <th>性別</th>
        </tr>
    </thead>
    <tbody>
@foreach($stafflist as $staff)
        <tr>
            <td><a href="{{ url('staff', $staff->id) }}">Detail</a></td>
            <td>{{ $staff->staff_no }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ Config::get('original.bumon')[$staff->busho] }}</td>
            <td>{{ $staff->sex }}</td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection