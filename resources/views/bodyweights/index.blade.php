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
      </div>
    </div>
  </div>
</div>
@endsection
