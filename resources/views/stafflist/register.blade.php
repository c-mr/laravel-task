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
            <th>{!! Form::label('busho','部署') !!}</th>
            <td>
            {!! Form::select('busho', Config::get('original.busho'), null, ['class' => 'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>{!! Form::label('sex','性別') !!}</th>
            <td>
            <label class="radio-inline">{!! Form::radio('sex', '1', null) !!} 男</label>
            <label class="radio-inline">{!! Form::radio('sex', '2', null) !!} 女</label>
            </td>
        </tr>
        <tr><td colspan="2">{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}</td></tr>
    </tbody>
</table>
{!! Form::close() !!}
@endsection