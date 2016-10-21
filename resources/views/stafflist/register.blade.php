@extends('stafflist.layout')

@section('content')

@include('errors.form_errors')


@if (empty($staff->id))
{!! Form::open(['url' => 'staff']) !!}
@else
{!! Form::model($staff, ['method' => 'PATCH', 'url' => ['staff', $staff->id]]) !!}
@endif

<table class="table">
    <caption>Staff create</caption>
    <tbody>
        <tr>
            <th>{!! Form::label('staff_no','社員番号') !!}</th>
            <td>
            {!! Form::text('staff_no', null, ['class' => 'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>{!! Form::label('name','名前') !!}</th>
            <td>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>{!! Form::label('department','部署') !!}</th>
            <td>
            {!! Form::select('department', ['' => '選択してください']+$department, null, ['class' => 'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>{!! Form::label('sex','性別') !!}</th>
            <td>
        @foreach($sex as $key => $value )
            <label class="radio-inline">{!! Form::radio('sex', $key, null) !!} {{ $value }}</label>
        @endforeach
            </td>
        </tr>
        <tr><td colspan="2">{!! Form::submit('保存', ['class' => 'btn btn-primary form-control']) !!}</td></tr>
    </tbody>
</table>
{!! Form::close() !!}
@endsection