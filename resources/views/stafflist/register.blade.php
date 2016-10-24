@extends('stafflist.layout')

@section('content')

<!-- エラー出力の読み込み -->
@include('errors.form_errors')


<table class="table">
    <caption>Staff create</caption>

<!-- idが送られて来ているかチェック -->
@if (empty($staff->id))
<!-- idが送られていなければ新規登録 -->
{!! Form::open(['url' => 'staff', 'name'=>'staff_form']) !!}
@else
<!-- idが送られていれば編集画面表示 -->
{!! Form::model($staff, ['method' => 'POST', 'url' => ['staff', $staff->id], 'name'=>'staff_form']) !!}
@endif

    <tbody>
        <tr>
            <!--  -->
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
    </tbody>
{!! Form::close() !!}
    <tfoot>
        <tr><td colspan="2">{!! Form::button('保存', ['class' => 'btn btn-primary form-control', 'id'=>'staff_formsubmit']) !!}</td></tr>
    </tfoot>
</table>
@endsection