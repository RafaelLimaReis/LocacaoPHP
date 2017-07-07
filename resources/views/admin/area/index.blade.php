@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Areas de Lazer</h1>
      </section>
      <div id="page-content">
        <div class="panel panel-success">
          <div class="panel-head">
            @include('flash::message')
          </div>
          <div class="panel-body">
            @include('admin.area.table')
          </div>
          </div>
        </div>
      </div>
@endsection
