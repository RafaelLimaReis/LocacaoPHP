@extends('admin.layouts.admin')

@section('content')
  <section id="page-title">
    <h1 class="page-header text-overflow">Usuario</h1>
  </section>
  <div id="page-content">
    <div class="panel panel-success col-sm-5">
      <div class="panel-head">
        @include('flash::message')
      </div>
      <div class="panel-body">
        @include('admin.users.show_fields')
        <a href="{{ route('admin.User.index') }}" class="btn btn-default btn-labeled fa fa-undo">Voltar</a>
      </div>
    </div>
    <div class="panel col-sm-5 col-md-offset-1">
      <div class="panel-heading">
        <h1 class="panel-title">Próximas Reservas</h1>
      </div>
      <div class="panel-body">
        @include('admin.users.table_reserves')
      </div>
    </div>
  </div>
@endsection
