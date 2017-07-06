@extends('admin.layouts.admin')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Areas de Lazer</h1>
      </section>
      <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-success">
          <div class="box-head">
            @include('flash::message')
          </div>
          <div class="box-body">
            @include('admin.area.table')
          </div>
          </div>
        </div>
      </div>
@endsection
