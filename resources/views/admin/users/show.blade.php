@extends('admin.layouts.admin')

@section('content')
  <section id="page-title">
    <h1 class="page-header text-overflow">Usuario</h1>
  </section>
  <div id="page-content">
    <div class="panel panel-success col-sm-6">
      <div class="panel-head">
        @include('flash::message')
      </div>
      <div class="panel-body">
        @include('admin.users.show_fields')
        <a href="{{ route('admin.User.index') }}" class="btn btn-default btn-labeled fa fa-undo">Voltar</a>
      </div>
    </div>
  </div>
@endsection
