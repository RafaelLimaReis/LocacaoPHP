@extends('admin.layouts.admin')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Usuarios</h1>
      </section>
      <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-success">
          <div class="box-head">
            @include('flash::message')
          </div>
          <div class="box-body">
            @include('admin.users.table')
          </div>
        </div>
      </div>
@endsection
